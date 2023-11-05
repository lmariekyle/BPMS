<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\DocumentDetails;
use App\Models\Document;
use App\Models\User;
use App\Models\Resident;
use App\Models\Complain;
use App\Models\Transaction;
use App\Models\AccountInfoChange;
use App\Notifications\NewRequestNotification;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function mobileTransactionRequest(Request $request){

        if ($request->hasFile('fileUpload')) {
            foreach ($request->file('fileUpload') as $file) {
                if ($file->isValid()) {
                    $file_name = Str::slug($request->requesteeLName) . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('requirements', $file_name);
                    $path = $file_name;
                    $certRequirements[] = $path;
                }
            }
            $reqJson = json_encode($certRequirements);
        } else {
            $reqJson = NULL;
        }

        $document = Document::where('id', $request->documentId)->first();
        $user = User::where('residentID', $request->userId)->first();
        $date = Carbon::now()->format('Y-m-d');

        if($document->docType == "File Complain"){
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-FC']);
            $payment = Payment::create([
                'paymentMethod' => $request->paymentMethod,
                'accountNumber' => NULL,
                'paymentStatus' => 'PAID',
                'successURL' => NULL,
                'failURL' =>  NULL,
            ]);

            $complain = Complain::create([
                'complaintFName' => $request->complaintFName,
                'complaintMName' => $request->complaintMName,
                'complaintLName' => $request->complaintLName,
                'complaintEmail' => $request->complaintEmail,
                'complaintContactNumber' => $request->complaintContactNumber,
                'complaineeFName' => $request->complaineeFName,
                'complaineeMName' => $request->complaineeMName,
                'complaineeLName' => $request->complaineeLName,
                'complaineeSitio' => $request->complaineeSitio,
                'requestPurpose' => $request->requestPurpose,
            ]);

            $detail = DocumentDetails::create([
                'requesteeFName' => $complain->complaintFName,
                'requesteeMName' => $complain->complaintMName,
                'requesteeLName' => $complain->complaintLName,
                'requesteeEmail'  => $complain->complaintEmail,
                'requesteeContactNumber' => $complain->complaintContactNumber,
                'requestPurpose' => $complain->requestPurpose,
            ]);

            $transaction = Transaction::create([
                'documentID' => $request->documentId,
                'userID' => $user->id,
                'paymentID' => $payment->id,
                'detailID' => $detail->id,
                'serviceAmount' =>  $request->serviceAmount,
                'docNumber' => $docId,
                'serviceStatus' => "Pending",
                'issuedDocument' => "Pending",
                'issuedBy' => $detail->requesteeFName . ' ' . $detail->requesteeLName,
                'issuedOn' => $date,
            ]);

            $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();

            Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));
        }else if($document->docType == "Account Information Change"){
            $account = AccountInfoChange::create([
                'userID' => $user->id,
                'selectedInformation' => $request->informationType,
                'requesteeOldInformation' => $request->oldInformation,
                'requesteeNewInformation' => $request->newInformation,
                'requestPurpose' => $request->changeReason,
                'file' => $reqJson,
                'status' => 'PENDING',
            ]);

            if($user->userLevel == 'Barangay Health Worker'){
                $currentUser = User::where('residentID', $request->userId)->first();
                $userData = Resident::where('id', $currentUser->residentID)->first();
                $userData->email = $currentUser->email;
                $userData->token = $request->token;
                $userData->success = true;

                return $userData;
            }
        }else{
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
                'file' => $reqJson,
            ]);

            if($document->docType == "Barangay Certificate"){
                $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CE']);
    
                $transaction = Transaction::create([
                    'documentID' => $request->documentId,
                    'userID' => $user->id,
                    'paymentID' => $payment->id,
                    'detailID' => $detail->id,
                    'serviceAmount' =>  $request->serviceAmount,
                    'docNumber' => $docId,
                    'serviceStatus' => "Pending",
                    'issuedDocument' => "Pending",
                    'issuedBy' => $detail->requesteeFName . ' ' . $detail->requesteeLName,
                    'issuedOn' => $date,
                ]);
            }else if($document->docType == "Barangay Clearance"){
                $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CL']);
    
                $transaction = Transaction::create([
                    'documentID' => $request->documentId,
                    'userID' => $user->id,
                    'paymentID' => $payment->id,
                    'detailID' => $detail->id,
                    'serviceAmount' =>  $request->serviceAmount,
                    'docNumber' => $docId,
                    'serviceStatus' => "Pending",
                    'issuedDocument' => "Pending",
                    'issuedBy' => $detail->requesteeFName . ' ' . $detail->requesteeLName,
                    'issuedOn' => $date,
                ]);
            }
                
            $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();
    
            Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));
        }
        if($request->paymentMethod == '2'){
            $receivedPayment = $this->createpayment($payment->id);

            $user->token = $request->token;
            $user->success = true;

            $documents = DB::select('select DISTINCT docType from documents');
            $userData = Resident::where('id', $request->userId)->first();

            $response = ['user' => $userData, 'documents' => $documents, 'payment' => $receivedPayment, 'success' => true];
            return $response;
        }

        $user->token = $request->token;
        $user->success = true;

        $documents = DB::select('select DISTINCT docType from documents');
        $userData = Resident::where('id', $request->userId)->first();

        $response = ['user' => $userData, 'documents' => $documents, 'success' => true, 'filePath' => $request->fileUpload];
        return $response;
        // return $this->createpayment($payment->id);
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
        // return Redirect::to($payment->successURL);
    }

    public function mobileCallback(Request $request)
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
