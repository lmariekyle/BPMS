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

        $document = Document::where('id', $request->documentId)->first();
        $user = User::where('residentID', $request->userId)->first();
        $user->makeVisible('firstName', 'middleName', 'lastName');
        $date = Carbon::now()->format('Y-m-d');
        $docType = $document->docType;
        $certRequirements = [];

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    if($document->docType == "File Complain"){
                        $file_name = Str::slug($request->complaintLName) . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    }else{
                        $file_name = Str::slug($request->lastName) . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    }
                    $file->storeAs('requirements', $file_name);
                    $path = $file_name;
                    $certRequirements[] = $path;
                }
            }
            $reqJson = json_encode($certRequirements);
        } else {
            $reqJson = NULL;
        }

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
                'file' => $reqJson,
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
                'issuedBy' => $user->id,
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
                    'issuedBy' => $user->id,
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
                    'issuedBy' => $user->id,
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
        $userData->makeVisible('firstName', 'middleName', 'lastName');

        if($document->docType == "Account Information Change"){
            $response = ['user' => $userData, 'documents' => $documents, 'success' => true];
        }else{
            $response = ['user' => $userData, 'documents' => $documents, 'success' => true];
        }
        
        return $response;
    }

    public function createpayment($id)
    {
        $payment = Payment::where('id', $id)->first();
        $payment->accountNumber = "Pending";
        $payment->paymentStatus = 'Pending';
        $payment->save();
        $payment->success = true;

        return $payment;
    }

    public function mobilePayment(Request $request){

        $paymentScreenshot = [];

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                        $file_name = Str::slug($request->lastName) . '_' . 'payment' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('requirements', $file_name);
                    $path = $file_name;
                    $paymentScreenshot[] = $path;
                }
            }
            $reqJson = json_encode( $paymentScreenshot);
        } else {
            $reqJson = NULL;
        }

        $payment = Payment::where('id', $request->paymentID)->first();

        $payment->update([
            'accountNumber' => $request->accountNumber,
            'paymentStatus' => 'Paid',
            'screenshot' => $reqJson,
        ]);

        $payment->save();

        $documents = DB::select('select DISTINCT docType from documents');
        $userData = Resident::where('id', $request->userID)->first();
        $userData->makeVisible('firstName', 'middleName', 'lastName');

        $response = ['user' => $userData, 'documents' => $documents, 'success' => true,];

        return $response;
    }
}
