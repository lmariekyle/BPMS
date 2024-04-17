<?php

namespace App\Http\Controllers;

use App\Models\AccountInfoChange;
use Illuminate\Support\Facades\Crypt;
use App\Models\Complain;
use App\Models\Document;
use App\Models\DocumentDetails;
use App\Models\Payment;
use App\Models\Resident;
use App\Models\Sitio;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\DenyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRequestNotification;
use App\Notifications\ProcessingNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use Barryvdh\DomPDF\Facade\PDF;
use PDF;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Notifications\ReleasedNotification;
use App\Notifications\SignatureNotification;
use App\Notifications\SignedNotification;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class ServicesController extends Controller
{


    public function dashboard()
    {
        $documents = Document::all();
        return view('dashboard', compact('documents'));
    }

    public function index()
    {
        $transactions = Transaction::paginate(10);
        $accounts = AccountInfoChange::paginate(10);
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
            $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }

        foreach ($accounts as $account) {
            $user = User::where('id', $account->userID)->first();
            $account->resident = Resident::where('id', $user->residentID)->first();
        }
        return view('services.index', compact('transactions', 'accounts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function direction($id)
    {
        
        $user = Auth::user()->userLevel;
        $transaction = Transaction::where('id', $id)->first();
        if ($user == 'Barangay Secretary') {
            if ($transaction->serviceStatus == 'Processing' || $transaction->serviceStatus == 'For Signature') {
                return $this->approve($id);
            } else {
                return $this->manage($id);
            }
        }else{
            if($transaction->serviceStatus == 'Endorsed'){
                return $this->approve($id);
            } else {
                return $this->manage($id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction->detail = DocumentDetails::where('id', $transaction->detailID)->first();
        $transaction->document = Document::where('id', $transaction->documentID)->first();
        $payment= Payment::where('id',$transaction->paymentID);
        $level = User::where('id', $transaction->userID)->first();
        $levelUser = Resident::where('id', $level->residentID)->first();
        $transaction->issuedBy = $levelUser->firstName. ' ' .$levelUser->lastName;
        $date = Carbon::now();
        $date->toArray();
        if ($transaction->detail && $transaction->detail->file) {
            $filePaths = json_decode($transaction->detail->file, true);
        } else {
            $filePaths = [];
        }        
        $transaction->payment = Payment::where('id', $transaction->paymentID)->first();

        return view('services.manage', compact('transaction', 'filePaths','date','payment'));
    }


    public function generate()
    {
        return view('services.generate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accepted(Request $request, $id)
    {
        
        $user = Auth::user();
        $userInfo = Resident::where('id', $user->residentID)->first();
        $transaction = Transaction::where('id', $id)->first();
        $transaction->fill([
            'remarks' => $request->remarks,
            'serviceStatus' => 'Processing',
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->first();
        Notification::sendNow($notifyUsers, new ProcessingNotification($transaction));

        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $level = User::where('id', $transaction->userID)->first();
            $levelUser = Resident::where('id', $level->residentID)->first();
            $transaction->issuedBy = $levelUser->firstName. ' ' .$levelUser->lastName;
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
     
        $transaction = Transaction::where('id', $id)->first();
        $transaction->payment = Payment::where('id', $transaction->paymentID)->first();
        if ($transaction->payment['paymentStatus'] == 'Paid') {
            $transaction->approval = 1;
        } else {
            $transaction->approval = 2;
        }
        $requestee = DocumentDetails::where('id', $transaction->detailID)->first(); 

        $doc = Document::where('id', $transaction->documentID)->first();
        $date = Carbon::now();
        $date_string=$date->toArray();
;
        
        // Assuming you have the month number (e.g., $date['month'] = 4 for April)
        // $dateObject = Carbon::createFromFormat('Y-m-d', $date_string);
        $monthNumber = $date_string['month'];
        $dateNum = $date_string['day']; 
        $year = $date_string['year']; 

        // Map month numbers to month names
        $monthNames = [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December"
        ];

        // Get the corresponding month name
        $monthWord = $monthNames[$monthNumber] ?? "Invalid month";

        if($transaction->documentID == 1){
        $requestee_user = User::where('id', $transaction->userID)->first();
        $resident = Resident::where('id', $requestee_user->residentID)->first();

        $birthdateCarbon = Carbon::createFromFormat('Y-m-d', $resident->dateOfBirth);

        $age = $birthdateCarbon->age;

            return view('services.approve', compact('id', 'requestee', 'doc', 'transaction','age','date','dateNum','year','monthWord'));
        }else{
            return view('services.approve', compact('id', 'requestee', 'doc', 'transaction','date','dateNum','year','monthWord'));
        }

    }


    public function request(string $docType)
    {
    
        $userAuth = Auth::user();
        $sitio = Sitio::where('id', $userAuth->sitioID)->first();
        $user = Resident::where('id', $userAuth->residentID)->first();
        $user->makeVisible('firstName', 'middleName', 'lastName');
        $doctypename = $docType;
        if ($docType == 'Barangay Certificate') {
            $doctypename = 'BARANGAY CERTIFICATE';
        } elseif ($docType == 'Barangay Clearance') {
            $doctypename = 'BARANGAY CLEARANCE';
        } elseif ($docType == 'File Complain') {
            $doctypename = 'FILE COMPLAIN';
        } elseif ($docType == 'Account Information Change') {
            $doctypename = 'ACCOUNT INFORMATION CHANGE';
        }
        $documents = Document::where('docType', $docType)->get();
   
        return view('services.request', compact('documents', 'doctypename', 'user','sitio'));
    }


    public function view_file($file)
    {
        
        $path = 'requirements/' . $file;

        // Determine the file's extension
        $extension = File::extension($path);

        // Set the appropriate Content-Type based on the file extension
        $contentType = $this->getContentTypeForExtension($extension);

        // Check if the file exists
        if (Storage::exists($path)) {
            return response()->file(Storage::path($path), ['content-type' => $contentType]);
        } else {
            return 'File not found';
        }
    }

    public function pdfGeneration($id)
    {
        //show how the page is

        
        $transaction = Transaction::where('id', $id)->first();
        $requestee = DocumentDetails::where('id', $transaction->detailID)->first();

        $residents = Resident::all();
        $residents->makeVisible('firstName', 'middleName', 'lastName');

        $check_res = $residents->where('firstName', '=', $requestee->requesteeFName)
        ->where('middleName', '=', $requestee->requesteeMName)
        ->where('lastName', '=', $requestee->requesteeLName)
        ->first();

        
        // Convert the birthdate string to a Carbon instance
        $birthdateCarbon = Carbon::createFromFormat('Y-m-d', $check_res->dateOfBirth);

        // Calculate the age
        $age = $birthdateCarbon->age;

        $doc = Document::where('id', $transaction->documentID)->first();
        $date = Carbon::now();
        $doc = Document::where('id', $transaction->documentID)->first();
        $date = Carbon::now();
        $date_string=$date->toArray();


        
        // Assuming you have the month number (e.g., $date['month'] = 4 for April)
        // $dateObject = Carbon::createFromFormat('Y-m-d', $date_string);
        $monthNumber = $date_string['month'];
        $dateNum = $date_string['day']; 
        $year = $date_string['year']; 

        // Map month numbers to month names
        $monthNames = [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December"
        ];

        // Get the corresponding month name
        $monthWord = $monthNames[$monthNumber] ?? "Invalid month";

        $pdf = PDF::loadView('documents.barangaycertificate', compact('id', 'requestee', 'doc','date','age','monthWord','dateNum','year','transaction'));
        $filename = "{$requestee->requesteeLName}_{$doc->docType}.pdf";
        return $pdf->download($filename);                 
    }


    private function getContentTypeForExtension($extension)
    {
        // Define content types for various file extensions
        $contentTypes = [
            'pdf' => 'application/pdf',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'jpg' => 'image/jpeg', // Add more as needed
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
        ];

        // Default to 'application/octet-stream' if the extension is not recognized
        return $contentTypes[$extension] ?? 'application/octet-stream';
    }


    public function storerequest(Request $request)
    {
        $certRequirements = [];
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
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

        $user = Auth::user();
        $doctype = Document::where('id', $request->selectedDocument)->first();

        if ($doctype->docType == "Barangay Certificate") {
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CE']);
        } else if ($doctype->docType == "Barangay Clearance") {
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CL']);
        } else if ($doctype->docType == "File Complain") {
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-FC']);
        }

        if ($doctype->docType != 'File Complain' && $doctype->docType != 'Account Information Change') {
            $transaction = new Transaction;
            $transactiondetail =  $transaction->transactiondetail()->create([
                'requesteeFName' => $request->requesteeFName,
                'requesteeMName' => $request->requesteeMName,
                'requesteeLName' => $request->requesteeLName,
                'requesteeEmail' => $request->requesteeEmail,
                'requesteeContactNumber' => $request->requesteeContactNumber,
                'requestPurpose' => $request->requestPurpose,
                'file' => $reqJson,
            ]);

            $transactionpayment = $transaction->transactionpayment()->create([
                'paymentMethod' => $request->paymentMethod,
                'amountPaid' => NULL,
                'accountNumber' => 'Pending',
                'paymentStatus' => 'Pending',
                'referenceNumber' => NULL,
                'remarks' =>  NULL,
            ]);
        } else if ($doctype->docType == "File Complain") {
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

            
            $transaction = new Transaction;
            $transactiondetail =  $transaction->transactiondetail()->create([
                'requesteeFName' => $request->complaintFName,
                'requesteeMName' => $request->complaintMName,
                'requesteeLName' => $request->complaintLName,
                'requesteeEmail' => $request->complaintEmail,
                'requesteeContactNumber' => $request->complaintContactNumber,
                'requestPurpose' => $request->requestPurpose,
                'file' => NULL,
            ]);

            $transactionpayment = $transaction->transactionpayment()->create([
                'paymentMethod' => 'FREE',
                'amountPaid' => 'Not Applicable',
                'accountNumber' => 'Not Applicable',
                'paymentStatus' => 'Paid',
                'referenceNumber' => 'Not Applicable',
                'remarks' =>  'Not Applicable',
            ]);            
        } else if ($doctype->docType == "Account Information Change") {
        //  dd($request);
            $account = AccountInfoChange::create([
                'userID' => $user->id,
                'selectedInformation' => $request->selectedInformation,
                'requesteeOldInformation' => $request->requesteeOldInformation,
                'requesteeNewInformation' => $request->requesteeNewInformation,
                'requestPurpose' => $request->requestPurpose,
                'file' => $reqJson,
                'status' => 'PENDING',
            ]);
            $account->userID = $user->id;

            return view('services.success');
        }

        if ($doctype->docType != 'Account Information Change') {
            $transactionPaymentId = $transactionpayment->id;
            $transactionDetailId = $transactiondetail->id;
            $transaction->detailID = $transactionDetailId;
            $transaction->userID = $user->id;
            $transaction->paymentID = $transactionPaymentId;
            $transaction->documentID = $doctype->id;
            $transaction->serviceAmount = $request->docfee;
            $transaction->serviceStatus = 'Pending';
            $transaction->docNumber = $docId;
            $transaction->save();

            $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();

            Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));
        }

        $payment = Payment::where('id', $transactionPaymentId)->first();
        
        if ($request->paymentMethod == 'GCASH') {
            $payment->amountPaid = $request->docfee;
            return view('services.gcash', compact('payment'));
            // return view('services.gcash', $payment->id);
            // return $this->createpayment($payment->id);
        } else {
            return view('services.success');
        }
    }


    // public function createInvoice($request)
    // {
    //     $xenditKey = base64_encode(env('XENDIT_SECRET_KEY'));
    //     $headers = [
    //         'Content-Type' => 'application/json',
    //         'Authorization' => 'Basic ' . $xenditKey,
    //     ];

    //     $res = Http::withHeaders($headers)
    //         ->withOptions([
    //             'curl' => [CURLOPT_SSL_VERIFYPEER => false],
    //         ])
    //         ->post('https://api.xendit.co/v2/invoices', $request);

    //     return json_decode($res->body(), true);
    // }

    //XENDIT PAYMENT FUNCTION

    // public function createpayment($id)
    // {
    //     $payment = Payment::where('id', $id)->first();
    //     $transaction = Transaction::where('paymentID', $payment->id)->first();
    //     $externalID = 'INV' . date('Ymd') . '-' . rand(1000, 9999);

    //     $payment->accountNumber = $externalID;
    //     $payment->save();
       
    //     $successRedirectUrl = route('services.success', $payment->id);
    //     $failureRedirectUrl = route('services.failure', $payment->id);

    //     $params = [
    //         'external_id' => $externalID,
    //         'amount' => $transaction->serviceAmount,
    //         'user_id' => $transaction->userID,
    //         'success_redirect_url' => $successRedirectUrl,
    //         'failure_redirect_url' => $failureRedirectUrl,
    //         'payment_methods' => ['GCASH'],
    //         'currency' => 'PHP',
    //         'invoice_duration' => 30000,
    //     ];

    //     $invoice = $this->createInvoice($params);
    //     $payment->update([
    //         'successURL' => $invoice['invoice_url']
    //     ]);
        

    //     $payment->paymentStatus = 'Pending';

    //     return Redirect::to($payment->successURL); 
    // }



    public function createpayment(Request $request , $id)
    {
        
        $payment = Payment::where('id', $id)->first();
        $transaction = Transaction::where('paymentID', $payment->id)->first();
  
        // return Redirect::to($payment->successURL); 
        return view('services.gcash', compact('payment'));
    }

    // public function storepayment(Request $request , $id)
    // {

    //     $payment = Payment::where('id', $id)->first();
    //     $transaction = Transaction::where('paymentID', $payment->id)->first();
    //     $externalID = 'PAYMENT' . date('Ymd') . '-' . rand(1000, 9999);
    
    //     $request->validate([
    //         'successURL' => 'required|numeric|digits:13',
    //         'screenshot' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
    //     ], [
    //         'successURL.required' => 'Reference Code cannot be empty',
    //         'successURL.numeric' => 'Reference Code must contain only numbers',
    //         'successURL.digits' => 'Reference Code must be exactly 13 digits long',
    //         'screenshot.mimes' => 'File type must be jpeg, png, or jpg',
    //     ]);

    //     // Check if there are validation errors
    //     if ($request->fails()) {
    //         // If there are validation errors, return back with errors
    //         $transaction->update([
    //             'serviceStatus' => 'Attempt Failed',
    //         ]);
    //         $transaction->save();

    //         $payment->update([
    //             'accountNumber' => NULL,
    //             'successURL' => NULL ,
    //             'screenshot' => NULL ,
    //             'paymentStatus' => 'Attempt Failed',
    //         ]);
    //         $payment->save();
    //         return back()->withErrors($request->errors())->withInput();
    //     }else{
            
    //     }
    //     // If there are no validation errors, proceed with the payment processing
    //     //Image Upload 
    //     if ($request->hasFile('screenshot')) {
    //         $screenshot_name = time() . '.' . $request->screenshot->getClientOriginalExtension();
    //         $path = $request->screenshot->storeAs('gcash', $screenshot_name, 'public');
    //     } else {
    //         $path = 'gcash/default.jpg';
    //     }


    //     $payment->update([
    //         'accountNumber' => $externalID,
    //         'successURL' => $request->successURL,
    //         'screenshot' => $path,
    //         'paymentStatus' => 'Paid'
    //     ]);
    //     $payment->save();

    //     // Redirect to the success page
    //     return view('services.success');
    // }

    public function storepayment(Request $request , $id)
{
    $payment = Payment::findOrFail($id);
    $transaction = Transaction::where('paymentID', $payment->id)->first();

    $request->validate([
        'successURL' => 'required|numeric|digits:13',
        'screenshot' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
    ], [
        'successURL.required' => 'Reference Code cannot be empty',
        'successURL.numeric' => 'Reference Code must contain only numbers',
        'successURL.digits' => 'Reference Code must be exactly 13 digits long',
        'screenshot.mimes' => 'File type must be jpeg, png, or jpg',
    ]);

    // If validation fails, the code execution will not reach here
    // Proceed with the payment processing
    //Image Upload 
    if ($request->hasFile('screenshot')) {
        $screenshot_name = time() . '.' . $request->screenshot->getClientOriginalExtension();
        $path = $request->screenshot->storeAs('gcash', $screenshot_name, 'public');
    } else {
        $path = 'gcash/default.jpg';
    }

    $payment->update([
        'referenceNumber' => $request->successURL,
        'screenshot' => $path,
        'paymentStatus' => 'Paid'
    ]);

    // Redirect to the success page
    return view('services.success');
}

    // public function createpayment(Request $request , $id)
    // {
    
    //     $request->validate([
    //         'successURL' => 'required|numeric|digits:13',
    //         'screenshot' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
    //     ], [
    //         'successURL.required' => 'Reference Code cannot be empty',
    //         'successURL.numeric' => 'Reference Code must contain only numbers',
    //         'successURL.digits' => 'Reference Code must be exactly 13 digits long',
    //         'screenshot.mimes' => 'File type must be jpeg, png, or jpg',
    //     ]);

    //     // Check if there are validation errors
    //     if ($request->fails()) {
    //         // If there are validation errors, return back with errors
    //         return back()->withErrors($request->errors())->withInput();
    //     }

    //     // If there are no validation errors, proceed with the payment processing
    //     //Image Upload 
    //     if ($request->hasFile('screenshot')) {
    //         $screenshot_name = time() . '.' . $request->screenshot->getClientOriginalExtension();
    //         $path = $request->screenshot->storeAs('gcash', $screenshot_name, 'public');
    //     } else {
    //         $path = 'gcash/default.jpg';
    //     }

    //     $payment = Payment::where('id', $id)->first();
    //     $transaction = Transaction::where('paymentID', $payment->id)->first();
    //     $externalID = 'PAYMENT' . date('Ymd') . '-' . rand(1000, 9999);

    //     $payment->update([
    //         'accountNumber' => $externalID,
    //         'successURL' => $request->successURL,
    //         'screenshot' => $path,
    //         'paymentStatus' => 'Paid'
    //     ]);
    //     $payment->save();

    //     // Redirect to the success page
    //     return back();
    // }




    // public function successpayment($id){

    //     $payment = Payment::where('id', $id)->first();

    //     $payment->update([
    //         'paymentStatus' => 'Paid'
    //     ]);

    //     $payment->save();

    //     return view('services.success');
    // }




    public function search(Request $request)
    {
        $search = $request['search'];
        $documents = Document::where('docName', 'LIKE', "%$search%")->get();
        $transactions1 = Transaction::all();
        $transactions2 = Transaction::all();
        $transactions = Null;

        $residentsFirstName = Resident::all();
        $residentsFirstName->makeVisible('firstName');

        foreach($residentsFirstName as $x=>$residentFirstName){
            if(strcasecmp($residentFirstName->firstName,$search) != 0){
                unset($residentsFirstName[$x]);
            }
        }

        $residentsLastName = Resident::all();
        $residentsLastName->makeVisible('lastName');

        foreach($residentsLastName as $x=>$residentLastName){
            if(strcasecmp($residentLastName->lastName,$search) != 0){
                unset($residentsLastName[$x]);
            }
        }

        $residentsFullName = Resident::all();
        $residentsFullName->makeVisible('firstName', 'lastName');

        foreach($residentsFullName as $x=>$residentFullName){
            $residentFullName->fullName = $residentFullName->firstName . ' ' . $residentFullName->lastName;
            if(strcasecmp($residentFullName->fullName,$search) != 0){
                unset($residentsFullName[$x]);
            }
        }

        $residents = $residentsFirstName->concat($residentsLastName)->concat($residentsFullName);

        if($documents->isNotEmpty()){
            foreach($transactions1 as $x=>$transaction1){
                foreach ($documents as $document){
                    if ($transaction1->documentID == $document->id) {
                        $user = User::where('id', $transaction1->userID)->first();
                        $transaction1->resident = Resident::where('id', $user->residentID)->first();
                        $transaction1->resident->makeVisible('firstName', 'lastName');
                        $transaction1->document = Document::where('id', $transaction1->documentID)->first();
                        $transaction1->issuedBy = $transaction1->resident->firstName. ' ' .$transaction1->resident->lastName;
                        $newtime = strtotime($transaction1->created_at);
                        $transaction1->createdDate = date('M d, Y', $newtime);
                    } else {
                        unset($transactions1[$x]);
                    }
                }
            }
            $transactions = $transactions1;
        }else{
            unset($transactions1);
        }
        
        if($residents->isNotEmpty()){
            foreach($transactions2 as $x=>$transaction2){
                foreach ($residents as $resident){
                    $user = User::where('residentID', $resident->id)->first();
                    if ($transaction2->userID == $user->id) {
                        $transaction2->resident = $resident; 
                        $transaction2->document = Document::where('id', $transaction2->documentID)->first();
                        $transaction2->issuedBy = $resident->firstName. ' ' .$resident->lastName;
                        $newtime = strtotime($transaction2->created_at);
                        $transaction2->createdDate = date('M d, Y', $newtime);
                    } else {
                        unset($transactions2[$x]);
                    }
                }
            }
            
            if($documents->isNotEmpty()){
                $transactions = $transactions->concat($transactions2);
            }else{
                $transactions = $transactions2;
            }
        }else{
            unset($transactions2);
        }

        return view('services.index')->with('transactions', $transactions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forwarded($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = Auth::user();
        $userInfo = Resident::where('id', $user->residentID)->first();
        $transaction->fill([
            'serviceStatus' => 'Endorsed',
            'endorsedBy' => $user->id,
            'endorsedOn' => today(),
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->get();
        $notifyCap = User::where('userLevel', 'Barangay Captain')->get();

        Notification::sendNow($notifyUsers, new ProcessingNotification($transaction));
        Notification::sendNow($notifyCap, new SignatureNotification($transaction));

        $transactions = Transaction::paginate(10);
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
            $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approval(Request $request, $id)
    {
        if ($request->status == 1) {
            $transaction = Transaction::where('id', $id)->first();
            $user = Auth::user();
            $userInfo = Resident::where('id', $user->residentID)->first();
            $transaction->fill([
                'serviceStatus' => 'For Signature',
                'approvedBy' => $user->id,
                'approvedOn' => today(),
            ]);
            $transaction->save();

            $transactions = Transaction::paginate(10);
            foreach ($transactions as $transaction) {
                $user = User::where('id', $transaction->userID)->first();
                $transaction->resident = Resident::where('id', $user->residentID)->first();
                $transaction->document = Document::where('id', $transaction->documentID)->first();
                $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
                $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
                $newtime = strtotime($transaction->created_at);
                $transaction->createdDate = date('M d, Y', $newtime);
            }
        } else if ($request->status == 2){
            $transaction = Transaction::where('id', $id)->first();
            $user = Auth::user();
            $resident = Resident::where('id', $user->residentID)->first();
            $transaction->fill([
                'serviceStatus' => 'Denied',
                'approvedBy' => 'Not Applicable',
                'releasedBy' => 'Not Applicable',
            ]);
            $transaction->save();

            $payment = Payment::where('id', $transaction->paymentID)->first();
            $payment->fill([
                'amountPaid' => NULL,
                'failURL' => 'Denied',
                'paymentStatus' => "Refunded",
            ]);
            $payment->save();

            $notifyUsers = User::where('id', $transaction->userID)->get();
            Notification::sendNow($notifyUsers, new DenyNotification($transaction));

            $transactions = Transaction::paginate(10);
            foreach ($transactions as $transaction) {
                $user = User::where('id', $transaction->userID)->first();
                $transaction->resident = Resident::where('id', $user->residentID)->first();
                $transaction->document = Document::where('id', $transaction->documentID)->first();
                $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
                $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
                $newtime = strtotime($transaction->created_at);
                $transaction->createdDate = date('M d, Y', $newtime);
            }
        } else{
            $transactions = Transaction::paginate(10);
            foreach ($transactions as $transaction) {
                $user = User::where('id', $transaction->userID)->first();
                $transaction->resident = Resident::where('id', $user->residentID)->first();
                $transaction->document = Document::where('id', $transaction->documentID)->first();
                $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
                $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
                $newtime = strtotime($transaction->created_at);
                $transaction->createdDate = date('M d, Y', $newtime);
            }
        }
        return view('services.index', compact('transactions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deny(Request $request,$id)
    {
        $user = Auth::user();
        $resident = Resident::find($user->residentID);
        $transaction = Transaction::where('id', $id)->first();
        $transaction->fill([
            'remarks' => $request->remarks,
            'serviceStatus' => "Not Eligible",
            'endorsedBy' => 'Not Applicable',
            'approvedBy' => 'Not Applicable',
            'releasedBy' => 'Not Applicable',
        ]);
        $transaction->save();

        $payment = Payment::where('id', $transaction->paymentID)->first();
        $payment->fill([
            'amountPaid' => NULL,
            'failURL' => 'Denied',
            'paymentStatus' => "Refunded",
        ]);
        $payment->save();


        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new DenyNotification($transaction));

        $transactions = Transaction::paginate(10);
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
            $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }



    public function signed($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = Auth::user();
        $resident = Resident::where('id', $user)->first();
        $transaction->fill([
            'serviceStatus' => 'Signed',
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new SignedNotification($transaction));

        $transactions = Transaction::paginate(10);
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
            $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }

    public function released($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = Auth::user();
        $resident = Resident::where('id', $user)->first();
        $transaction->fill([
            'releasedBy' => $user->id,
            'releasedOn' => today(),
            'serviceStatus' => 'Released',
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new ReleasedNotification($transaction));

        $transactions = Transaction::paginate(10);
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $docDetails = DocumentDetails::where('id', $transaction->detailID)->first();
            $transaction->requesteeName = $docDetails->requesteeFName. ' ' .$docDetails->requesteeLName;
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }
}