<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\DocumentDetails;
use App\Models\Document;
use App\Models\User;
use App\Models\Sitio;
use App\Models\Resident;
use App\Models\Complain;
use App\Models\Transaction;
use App\Models\AccountInfoChange;
use App\Models\Households;
use App\Models\ResidentList;
use App\Notifications\NewRequestNotification;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function requestList($id){

        $userTransactions = Transaction::where('userID', $id)->paginate(10);

        foreach ($userTransactions as $userTransaction) {
            // Retrieve the document associated with the transaction
            $userTransaction->document = Document::find($userTransaction->documentID);
        }

        // dd($userTransactions);
        return view('residents.requests',compact('userTransactions'));
    }

    public function showRequest($id){

        
        $transaction=Transaction::where('id',$id)->first();
        $requester = DocumentDetails::where('id',$transaction->detailID)->first();
        $doc = Document::where('id',$transaction->documentID)->first();
        $requester->makeVisible('requesteeFName', 'requesteeLName','requesteeContactNumber');
        $endorsedUser = NULL;
        $approvedUser = NULL;
        $releasedUser = NULL;

        if ($transaction->endorsedBy !== null) {
            $endorsed = User::where('id', $transaction->endorsedBy)->first();
            if ($endorsed !== null) {
                $endorsedUser = Resident::where('id', $endorsed->residentID)->first();
                if ($endorsedUser !== null) {
                    $endorsedUser->makeVisible('firstName', 'lastName');
                }
            }
        
            if ($transaction->approvedBy === null) {
                // return view('residents.show', compact('transaction','doc','requester','endorsedUser'));
                return view('residents.show', compact('transaction','doc','requester','releasedUser','approvedUser','endorsedUser'));
            } else {
                $approved = User::where('id', $transaction->approvedBy)->first();
                if ($approved !== null) {
                    $approvedUser = Resident::where('id', $approved->residentID)->first();
                    if ($approvedUser !== null) {
                        $approvedUser->makeVisible('firstName', 'lastName');
                    }
                }
        
                if ($transaction->releasedBy === null) {
                    // return view('residents.show', compact('transaction','doc','requester','endorsedUser','approvedUser'));
                    return view('residents.show', compact('transaction','doc','requester','releasedUser','approvedUser','endorsedUser'));
                } else {
                    $released = User::where('id', $transaction->releasedBy)->first();
                    if ($released !== null) {
                        $releasedUser = Resident::where('id', $released->residentID)->first();
                        if ($releasedUser !== null) {
                            $releasedUser->makeVisible('firstName', 'lastName');
                        }
                    }
                    // return view('residents.show', compact('transaction','doc','requester','releasedUser','approvedUser','endorsedUser'));
                    return view('residents.show', compact('transaction','doc','requester','releasedUser','approvedUser','endorsedUser'));
                }
            }
        }else{
            return view('residents.show', compact('transaction','doc','requester','releasedUser','approvedUser','endorsedUser'));
        }
        // $document = Document::where('id', $userTransactions->documentID)->first();
    }


    public function getDocuments(Request $request)
    {
        $status = $request->input('status');
        $userId = Auth::id();
        

        if($status == 'Pending'){
            
            $documents = Transaction::with(['document', 'transactionpayment','user.resident'])
            ->whereHas('transactionpayment', function ($query) use ($userId) {
                $query->where('paymentStatus', '=', 'Pending')
                      ->where('userID', '=', $userId);
            })
            ->get();
            foreach ($documents as $document) {
                // Load the related models based on the IDs stored in the Transaction table
                $document->load('document', 'transactionpayment', 'user.resident');
                
                // Make the resident's firstName and lastName visible
                if ($document->user->resident) {
                    $document->user->resident->makeVisible(['firstName', 'lastName']);
                }
            }
        }elseif ($status == 'Paid'){
            $documents = Transaction::with(['document', 'transactionpayment','user.resident'])
            ->whereHas('transactionpayment', function ($query) use ($userId) {
                $query->where('paymentStatus', '=', 'Paid')
                      ->where('userID', '=', $userId);
            })
            ->get();
            foreach ($documents as $document) {
                // Load the related models based on the IDs stored in the Transaction table
                $document->load('document', 'transactionpayment', 'user.resident');
                
                // Make the resident's firstName and lastName visible
                if ($document->user->resident) {
                    $document->user->resident->makeVisible(['firstName', 'lastName']);
                }
            }
        }elseif ($status == 'Processing'){
            $documents = Transaction::with(['document', 'transactionpayment','user.resident'])
            ->whereIn('serviceStatus', ['Pending', 'Processing', 'Endorsed', 'For Signature', 'Signed'])
            ->where('userID', $userId)
            ->get();
            foreach ($documents as $document) {
                // Load the related models based on the IDs stored in the Transaction table
                $document->load('document', 'transactionpayment', 'user.resident');
                
                // Make the resident's firstName and lastName visible
                if ($document->user->resident) {
                    $document->user->resident->makeVisible(['firstName', 'lastName']);
                }
            }
        }elseif ($status == 'Released'){
            $documents = Transaction::with(['document', 'transactionpayment','user.resident'])
            ->where('serviceStatus', '=', 'Released')
            ->where('userID', $userId)
            ->get();
            
            foreach ($documents as $document) {
                // Load the related models based on the IDs stored in the Transaction table
                $document->load('document', 'transactionpayment', 'user.resident');
                
                // Make the resident's firstName and lastName visible
                if ($document->user->resident) {
                    $document->user->resident->makeVisible(['firstName', 'lastName']);
                }
            }
        }elseif ($status == 'Denied'){
            $documents = Transaction::with(['document', 'transactionpayment','user.resident'])
            ->whereIn('serviceStatus', ['Not Eligible', 'Denied'])
            ->where('userID', $userId)
            ->get();
            foreach ($documents as $document) {
                // Load the related models based on the IDs stored in the Transaction table
                $document->load('document', 'transactionpayment', 'user.resident');
                
                // Make the resident's firstName and lastName visible
                if ($document->user->resident) {
                    $document->user->resident->makeVisible(['firstName', 'lastName']);
                }
            }
        }

        
        return response()->json($documents);
    }



    public function mobileTransactionRequest(Request $request){

        if($request->documentId == "Account Information Change"){
            $document = Document::where('docType', $request->documentId)->first();
        }else{
            $document = Document::where('id', $request->documentId)->first();
        }
        $user = User::where('residentID', $request->userId)->first();
        $user->makeVisible('firstName', 'middleName', 'lastName');
        $date = Carbon::now()->format('Y-m-d');
        $certRequirements = [];
        $doctype = Document::where('id', $request->documentId)->first();
        $docNumber = app('App\Http\Controllers\ServicesController')->docNumber($document);

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
            $residents = Resident::all();
            $residents->makeVisible('firstName');
            $residents->makeVisible('lastName');

            $check_res = $residents->where('firstName', '=', $request->complaineeFName)
            ->where('lastName', '=', $request->complaineeLName)
            ->first();

            if($check_res != NULL) {
            
                $sitio = Sitio::where('sitioName', $request->complaineeSitio)->first();

                if($sitio !== null){
                    $payment = Payment::create([
                        'paymentMethod' => $request->paymentMethod,
                        'accountNumber' => 'Not Applicable',
                        'paymentStatus' => 'Paid',
                        'referenceNumber' => 'Not Applicable',
                        'remarks' =>  'Not Applicable',
                    ]);

                    if($request->complaintMName == null ){
                        $request->complaintMName == 'N/A';
                    }else if($request->complaineeMName == null){
                        $request->complaineeMName == 'N/A';
                    }

                    $detail = DocumentDetails::create([
                        'requesteeFName' => $request->complaintFName,
                        'requesteeMName' => $request->complaintMName,
                        'requesteeLName' => $request->complaintLName,
                        'requesteeEmail'  => $request->complaintEmail,
                        'requesteeContactNumber' => $request->complaintContactNumber,
                        'requestPurpose' => $request->requestPurpose,
                        'file' => $reqJson,
                    ]);

                    $transaction = Transaction::create([
                        'documentID' => $doctype->id,
                        'userID' => $user->id,
                        'paymentID' => $payment->id,
                        'detailID' => $detail->id,
                        'docNumber' => $docNumber,
                        'serviceStatus' => "Pending",
                    ]);

                    
                    $complain = Complain::create([
                        'transactionID' => $transaction->id,
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

                    $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();

                    Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));

                    $response = ['paymentID' => $payment->id,'success' => true];
                    
                }else{
                    $response = ['message' => 'Resident Not Found','success' => false];
                }
            }else{
                $response = ['message' => 'Resident Not Found','success' => false];
            }
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
            }else{
                $response = ['success' => true];
            }
        }else{
            if ($request->paymentMethod == '1'){
                $payment = Payment::create([
                    'paymentMethod' => 'Cash-on-PickUp',
                    'accountNumber' => 'Not Applicable',
                    'amountPaid' => $doctype->fee,
                    'paymentStatus' => 'Pending',
                    'referenceNumber' => 'Not Applicable',
                    'remarks' => 'Not Applicable',
                ]);
            }else{
                $payment = Payment::create([
                    'paymentMethod' => 'GCash',
                    'accountNumber' => 'Pending',
                    'paymentStatus' => 'Pending',
                    'referenceNumber' => 'Pending',
                    'remarks' => 'Pending',
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
               
    
                $transaction = Transaction::create([
                    'documentID' => $request->documentId,
                    'userID' => $user->id,
                    'paymentID' => $payment->id,
                    'detailID' => $detail->id,
                    'docNumber' => $docNumber,
                    'serviceStatus' => "Pending",
                ]);
            }else if($document->docType == "Barangay Clearance"){
                $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CL']);
    
                $transaction = Transaction::create([
                    'documentID' => $request->documentId,
                    'userID' => $user->id,
                    'paymentID' => $payment->id,
                    'detailID' => $detail->id,
                    'docNumber' => $docNumber,
                    'serviceStatus' => "Pending",
                ]);
            }
                
            $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();
    
            Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));
            $response = ['paymentID' => $payment->id,'success' => true];
        }
        
        return $response;
    }

    public function findPayment(Request $request){
            $receivedPayment = $this->createpayment($request->paymentID);
            $transaction = Transaction::where('paymentID', $receivedPayment->id)->first();
            $document = Document::where('id', $transaction->documentID)->first();
            $receivedPayment->fee = $document->fee;

            $userData = Resident::where('id', $request->residentID)->first();
            $userData->makeVisible('lastName');

            $response = ['user' => $userData, 'payment' => $receivedPayment, 'success' => true];
            return $response;
    }

    public function createpayment($id)
    {
        $payment = Payment::where('id', $id)->first();
        $payment->orNumber = "Pending";
        $payment->paymentStatus = 'Pending';
        $payment->save();
        $payment->success = true;

        return $payment;
    }

    public function mobilePayment(Request $request){

        $paymentScreenshot = [];

        $transaction = Transaction::where('paymentID', $request->paymentID)->first();
        $document = Document::where('id', $transaction->documentID)->first();
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
            'amountPaid' => $document->fee,
            'referenceNumber' => $request->accountNumber,
            'paymentStatus' => 'Paid',
            'screenshot' => $reqJson,
        ]);

        $payment->save();

        $response = ['success' => true,];

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
        
        if($transaction->endorsedBy != null){
            if($transaction->endorsedBy != 'Not Applicable'){
                $employee = Resident::where('id', $transaction->endorsedBy)->first();
                $employee->makeVisible('firstName', 'lastName');
                $transaction->endorsedBy = $employee->firstName. ' ' .$employee->lastName; 
            }
        }
        if($transaction->approvedBy != null){
            if($transaction->approvedBy != 'Not Applicable'){
                $employee = Resident::where('id', $transaction->approvedBy)->first();
                $employee->makeVisible('firstName', 'lastName');
                $transaction->approvedBy = $employee->firstName. ' ' .$employee->lastName; 
            }
        }
        if($transaction->releasedBy != null){
            if($transaction->releasedBy != 'Not Applicable'){
                $employee = Resident::where('id', $transaction->releasedBy)->first();
                $employee->makeVisible('firstName', 'lastName');
                $transaction->releasedBy = $employee->firstName. ' ' .$employee->lastName; 
            }
        }

        $response = ['transaction' => $transaction, 'details' => $transactiondetails, 'payment' => $payment, 'document' => $document, 'user' => $resident, 'success' => true,];
        return $response;
    }
}
