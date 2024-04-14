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
                'accountNumber' => 'Not Applicable',
                'paymentStatus' => 'Paid',
                'successURL' => 'Not Applicable',
                'failURL' =>  'Not Applicable',
            ]);

            if($request->complaintMName == null ){
                $request->complaintMName == 'N/A';
            }else if($request->complaineeMName == null){
                $request->complaineeMName == 'N/A';
            }

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
                'docNumber' => $docId,
                'serviceStatus' => "Pending",
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
                    'paymentMethod' => 'Cash-on-PickUp',
                    'accountNumber' => 'Not Applicable',
                    'paymentStatus' => 'Pending',
                    'successURL' => 'Not Applicable',
                    'failURL' => 'Not Applicable',
                ]);
            }else{
                $payment = Payment::create([
                    'paymentMethod' => 'GCash',
                    'accountNumber' => 'Pending',
                    'paymentStatus' => 'Pending',
                    'successURL' => 'Pending',
                    'failURL' => 'Pending',
                ]);
            }

            if($request->middleName == null ){
                $request->middleName == 'N/A';
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
                    'docNumber' => $docId,
                    'serviceStatus' => "Pending",
                ]);
            }else if($document->docType == "Barangay Clearance"){
                $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CL']);
    
                $transaction = Transaction::create([
                    'documentID' => $request->documentId,
                    'userID' => $user->id,
                    'paymentID' => $payment->id,
                    'detailID' => $detail->id,
                    'docNumber' => $docId,
                    'serviceStatus' => "Pending",
                ]);
            }
                
            $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();
    
            Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));
        }
        if($request->paymentMethod == '2'){
            $receivedPayment = $this->createpayment($payment->id);
            $receivedPayment->fee = $document->fee;

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

        $transaction = Transaction::where('paymentID', $request->paymentID)->first();
        $detail = DocumentDetails::where('id', $transaction->detailID)->first();
        $detail->makeVisible('requesteeLName');

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                        $file_name = Str::slug($detail->requesteeLName) . '_' . 'payment' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('paymentRecords', $file_name);
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

    public function mobileRequestList(Request $request){
        $user = User::where('residentID', $request->id)->first();
        $transactions = Transaction::where('userID', $user->id)->get();
        foreach($transactions as $transaction){
            $document = Document::where('id', $transaction->documentID)->first();
            $payment = Payment::where('id', $transaction->paymentID)->first();
            $transaction->documentName = $document->docName;
            $transaction->paymentStatus = $payment->paymentStatus;
        }
        

        $response = ['transactions' => $transactions, 'success' => true,];

        return $response;
    }

    public function mobileRequestDetails(Request $request){
        $transaction = Transaction::where('id', $request->id)->first();
        $transactiondetails = DocumentDetails::where('id', $transaction->detailID)->first();
        $payment = Payment::where('id', $transaction->paymentID)->first();
        $document = Document::where('id', $transaction->documentID)->first();
        $user = User::where('id', $transaction->userID)->first();
        $resident = Resident::where('id', $user->residentID)->first();
        $response = ['transaction' => $transaction, 'details' => $transactiondetails, 'payment' => $payment, 'document' => $document, 'user' => $resident, 'success' => true,];
        return $response;
    }
}
