<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\DocumentDetails;
use App\Models\Document;
use App\Models\User;
use App\Models\Transaction;
use App\Notifications\NewRequestNotification;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function mobileTransactionRequest(Request $request){
        $request->validate([
            'userId' => 'required',
            'documentId' => 'required',
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'contactNumber' => 'required',
            'requestPurpose' => 'required',
            'serviceAmount' => 'required',
            'paymentMethod' => 'required',
        ]);

        if ($request->paymentMethod == '1'){
            $payment = Payment::create([
                'paymentMethod' => 'CASH-ON-SITE',
                'accountNumber' => 'None',
                'paymentStatus' => 'Pending',
                'successURL' => 'Not Applicable',
                'failURL' => 'Not Applicable',
            ]);
        }else{
            $payment = Payment::create([
                'paymentMethod' => 'GCASH',
                'accountNumber' => 'Pending',
                'paymentStatus' => 'Pending',
                'successURL' => 'Unavailable',
                'failURL' => 'Unavailable',
            ]);
        }

        $detail = DocumentDetails::create([
            'requesteeFName' => $request->firstName,
            'requesteeMName' => $request->middleName,
            'requesteeLName' => $request->lastName,
            'requesteeEmail'  => $request->email,
            'requesteeContactNumber' => $request->contactNumber,
            'requestPurpose' => $request->requestPurpose,
        ]);

        $document = Document::where('id', $request->documentId)->first();
        $user = User::where('residentID', $request->userId)->first();

        if($document->docType == "Barangay Certificate"){
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CE']);
        }else if($document->docType == "Barangay Clearance"){
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CL']);
        }else{
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-FC']);
        }

        $date = Carbon::now()->format('Y-m-d');

        $transaction = Transaction::create([
            'documentID' => $request->documentId,
            'userID' => $user->id,
            'paymentID' => $payment->id,
            'detailID' => $detail->id,
            'serviceAmount' =>  $request->serviceAmount,
            'docNumber' => $docId,
            'serviceStatus' => "Pending",
            'paymentMethod' => $payment->paymentMethod,
            'issuedDocument' => "http://",
            'issuedBy' => $request->requesteeFName . ' ' . $request->requesteeLName,
            'issuedOn' => $date,
        ]);

        $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();

        Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));

        $response = ['success' => true];
        return $this->createpayment($payment->id);
    }

    public function createInvoice($request)
    {
        $xenditKey = base64_encode(env('XENDIT_SECRET_KEY'));
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $xenditKey,
        ];
    
        $res = Http::withHeaders($headers)
            ->withOptions([
                'curl' => [CURLOPT_SSL_VERIFYPEER => false],
            ])
            ->post('https://api.xendit.co/v2/invoices', $request);
    
        return json_decode($res->body(), true);
            }

    public function createpayment($id)
    {
        $payment = Payment::where('id', $id)->where('paymentStatus', 'Pending')->first();
        $transaction = Transaction::where('paymentID', $payment->id)->first();
        $externalID = 'INV' . date('Ymd') . '-' . rand(1000, 9999);

        $payment->accountNumber = $externalID;
        $payment->save();

        $params = [
            'external_id' => $externalID,
            'amount' => $transaction->serviceAmount,
            'user_id' => $transaction->userID,
            'invoice_duration' => 3600,
        ];

        $invoice = $this->createInvoice($params);
        $payment->update([
            'successURL' => $invoice['invoice_url']
        ]);

        $payment->paymentStatus = 'Pending';
        $payment->success = true;

        return $payment;
    }

    public function callback(Request $request)
    {
        try {
            $payment = Payment::where('accountNumber', $request->external_id)->first();
            if ($request->header('x-callback-token') != env('XENDIT_CALLBACK_TOKEN')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Callback Token'
                ], 400);
            }

            if ($payment) {
                if ($request->status == 'PAID') {
                    $payment->update([
                        'paymentStatus' => 'Paid'
                    ]);
                } else {
                    $payment->update([
                        'paymentStatus' => 'Expired',
                    ]);
                }
            }

            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
