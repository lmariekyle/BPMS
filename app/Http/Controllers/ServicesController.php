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
use App\Models\Households;
use App\Models\ResidentList;
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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;


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
        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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

    public function getTransactions(Request $request){
        $status = $request->input('status');

        if($status == 'Pending'){
            $documents = Transaction::with(['document', 'transactionpayment','user.resident'])
            ->whereHas('transactionpayment', function ($query) {
                $query->where('paymentStatus', '=', 'Pending');
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
            ->whereHas('transactionpayment', function ($query) {
                $query->where('paymentStatus', '=', 'Paid');
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
            if ($transaction->serviceStatus == 'Processing' || $transaction->serviceStatus == 'Approved') {
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
            'endorsedBy' => $user->id,
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->first();
        Notification::sendNow($notifyUsers, new ProcessingNotification($transaction));

        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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
        $complain=NULL;
        if($transaction->documentID == 7){
            $complain = Complain::where('transactionID',$transaction->id)->first();
            $complain->makeVisible('complaineeFName','complaineeFName','complaineeFName');
        }
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

        $residents = Resident::all();
        $residents->makeVisible('firstName','lastName');

        $check_res = $residents->where('firstName', '=', $requestee->requesteeFName)
        ->where('lastName', '=', $requestee->requesteeLName)
        ->first();

        
        // Convert the birthdate string to a Carbon instance
        $birthdateCarbon = Carbon::createFromFormat('Y-m-d', $check_res->dateOfBirth);
        $gender = $check_res->gender;

        
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

        if($transaction->documentID == 1 || $transaction->documentID == 3){
        $requestee_user = User::where('id', $transaction->userID)->first();
        $resident = Resident::where('id', $requestee_user->residentID)->first();
        $birthdateCarbon = Carbon::createFromFormat('Y-m-d', $resident->dateOfBirth);

        $sitio=Sitio::where('id',$check_res->user->sitioID)->first();
        $age = $birthdateCarbon->age;
        $gender = $check_res->gender;
            return view('services.approve', compact('id', 'requestee', 'doc', 'transaction','age','date','dateNum','year','monthWord','gender','birthdateCarbon','sitio'));
        }else{
            $sitio=Sitio::where('id',$check_res->user->sitioID)->first();
            return view('services.approve', compact('id', 'requestee', 'doc', 'transaction','date','dateNum','year','monthWord','gender','birthdateCarbon','sitio','complain'));
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
   
        return view('services.request', compact('documents', 'doctypename', 'user', 'userAuth','sitio'));
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
        $requestee->makeVisible('requesteeFName','requesteeLName');

        $residents = Resident::all();
        $residents->makeVisible('firstName','lastName');

        
        $check_res = $residents->where('firstName', '=', $requestee->requesteeFName)
        ->where('lastName', '=', $requestee->requesteeLName)
        ->first();
        
        $sitio=Sitio::where('id',$check_res->user->sitioID)->first();
        
        // Convert the birthdate string to a Carbon instance
        $birthdateCarbon = Carbon::createFromFormat('Y-m-d', $check_res->dateOfBirth);
        $gender = $check_res->gender;


        // Calculate the age
        $age = $birthdateCarbon->age;

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

       
        $pdf = PDF::loadView('documents.barangaycertificate', compact('id', 'requestee', 'doc','date','age','monthWord','dateNum','year','transaction','birthdateCarbon','gender','sitio'));
        $filename = "{$requestee->requesteeLName}_{$doc->docName}.pdf";
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
       
        
        $docNumber = $this->docNumber($doctype);

        $residents = Resident::all();
        $residents->makeVisible('firstName','lastName');

        
    
        if ($doctype->docType != 'File Complain' && $doctype->docType != 'Account Information Change') {
                $check_res = $residents->where('firstName', '=', $request->requesteeFName)
                ->where('lastName', '=', $request->requesteeLName)
                ->first();

            
                if($check_res !== null) {
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
                    'amountPaid' => $doctype->fee,
                    'orNumber' => 'Pending',
                    'paymentStatus' => 'Pending',
                    'referenceNumber' => NULL,
                    'remarks' =>  NULL,
                ]);
            }else{
                Session::flash('warning', 'Requester must be a resident in Barangay Poblacion, Dalaguete');
                return redirect()->back();
            }
        } else if ($doctype->docType == "File Complain") {

                $check_res = $residents->where('firstName', '=', $request->complaineeFName)
                ->where('lastName', '=', $request->complaineeLName)
                ->first();

            if ($check_res !== null) {

                $sitio = Sitio::where('sitioName', $request->complaineeSitio)->first();
      
                if($sitio !== null){
                
                    $transactionpayment = Payment::create([
                        'paymentMethod' => $request->paymentMethod,
                        'accountNumber' => 'Not Applicable',
                        'paymentStatus' => 'Paid',
                        'referenceNumber' => 'Not Applicable',
                        'remarks' =>  'Not Applicable',
                    ]);

                    $transactiondetail = DocumentDetails::create([
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
                        'paymentID' => $transactionpayment->id,
                        'detailID' => $transactiondetail->id,
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
    
                }else{

                    Session::flash('warning', 'Sitio must be a sitio in Barangay Poblacion, Dalaguete');
                    return redirect()->back();
                }

            } else {
                Session::flash('warning', 'Complainee must be a resident of Barangay Poblacion, Dalaguete');
                return redirect()->back();

            }
                    
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
            $transaction->serviceStatus = 'Pending';
            $transaction->docNumber = $docNumber;
            $transaction->save();

            $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();

            Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));
        }

        if ($doctype->docName == 'Senior Citizen') {
            $payment = Payment::where('id', $transactionPaymentId)->first();
            $payment->fill([
                'remarks' => 'FREE',
                'paymentStatus' => "Paid",
                'orNumber' => '000000',
            ]);
            $payment->save();
        }

        $payment = Payment::where('id', $transactionPaymentId)->first();
        
        if ($request->paymentMethod == 'GCASH') {
            // $payment->amountPaid = $request->docfee;
            // return view('services.gcash', compact('payment'));
            // return view('services.gcash', $payment->id);
            return $this->createpayment($payment->id);
        } else {
            
            return view('services.success');
        }
    }


    // public function search(Request $request)
    // {
    //     $search = $request['search'];
    
    //     if(empty($search)){
    //         return $this->index();
    //     }
    
    //     $transactions = Transaction::paginate(10);
    
    //     $filteredTransactions = [];
    
    //     foreach ($transactions as $transaction) {
    //         $transaction->document = Document::find($transaction->documentID);
    //         $user = User::where('id', $transaction->userID)->first();
    //         $transaction->resident = Resident::find($user->residentID);
    //         $transaction->resident->makeVisible('firstName', 'lastName');
    //         $fullName = $transaction->resident->firstName . ' ' . $transaction->resident->lastName;
    //         $transaction->document = Document::find($transaction->documentID);
    //         if (Str::contains(strtolower($transaction->document['docName']), strtolower($search))) {
    //             $docDetails = DocumentDetails::find($transaction->detailID);
    //             $docDetails->makeVisible('requesteeFName', 'requesteeLName');
    //             $transaction->requesteeName = $docDetails->requesteeFName . ' ' . $docDetails->requesteeLName;
    //             $transaction->createdDate = date('M d, Y', strtotime($transaction->created_at));
    
    //             $filteredTransactions[] = $transaction;
    //         } else if (Str::contains(strtolower($fullName), strtolower($search))){
    //             $docDetails = DocumentDetails::find($transaction->detailID);
    //             $docDetails->makeVisible('requesteeFName', 'requesteeLName');
    //             $transaction->requesteeName = $docDetails->requesteeFName . ' ' . $docDetails->requesteeLName;
    //             $transaction->createdDate = date('M d, Y', strtotime($transaction->created_at));

    //             $filteredTransactions[] = $transaction;
    //         }
    //     }
    //     return view('services.index')->with('transactions', $filteredTransactions);
    // }

    public function search(Request $request)
{
    $search = $request->input('search');

    if(empty($search)){
        return $this->index();
    }

    $perPage = 10; // Number of items per page

    $transactions = Transaction::paginate($perPage);

    $filteredTransactions = [];

    foreach ($transactions as $transaction) {
        $transaction->document = Document::find($transaction->documentID);
        $user = User::where('id', $transaction->userID)->first();
        $transaction->resident = Resident::find($user->residentID);
        $transaction->resident->makeVisible('firstName', 'lastName');
        $fullName = $transaction->resident->firstName . ' ' . $transaction->resident->lastName;
        $transaction->document = Document::find($transaction->documentID);
        
        // Check if the document name or resident's full name contains the search term
        if (Str::contains(strtolower($transaction->document->docName), strtolower($search)) || Str::contains(strtolower($fullName), strtolower($search))) {
            $docDetails = DocumentDetails::find($transaction->detailID);
            $docDetails->makeVisible('requesteeFName', 'requesteeLName');
            $transaction->requesteeName = $docDetails->requesteeFName . ' ' . $docDetails->requesteeLName;
            $transaction->createdDate = date('M d, Y', strtotime($transaction->created_at));

            $filteredTransactions[] = $transaction;
        }
    }

    // Create a paginator instance
    $paginator = new LengthAwarePaginator(
        $filteredTransactions, // Items for the current page
        count($filteredTransactions), // Total count of all items
        $perPage, // Items per page
        $request->input('page', 1), // Current page
        ['path' => $request->url(), 'query' => $request->query()] // Additional options for the paginator
    );

    return view('services.index')->with('transactions', $paginator);
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

        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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
                'serviceStatus' => 'Approved',
                'approvedBy' => $user->id,
                'approvedOn' => today(),
            ]);
            $transaction->save();

            $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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
            if($payment->paymentStatus == "Paid"){
                $payment->fill([
                    'remarks' => 'Denied',
                    'paymentStatus' => "Refunded",
                ]);
                $payment->save();
            }else if($payment->paymentStatus == "Pending"){
                $payment->fill([
                    'remarks' => 'Denied',
                    'paymentStatus' => "Not Applicable",
                ]);
                $payment->save();
            }

            $notifyUsers = User::where('id', $transaction->userID)->get();
            Notification::sendNow($notifyUsers, new DenyNotification($transaction));

            $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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
            $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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
        if($payment->paymentStatus == "Paid"){
            $payment->fill([
                'remarks' => 'Denied',
                'paymentStatus' => "Refunded",
            ]);
            $payment->save();
        }else if($payment->paymentStatus == "Pending"){
            $payment->fill([
                'remarks' => 'Denied',
                'paymentStatus' => "Not Applicable",
            ]);
            $payment->save();
        }



        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new DenyNotification($transaction));

        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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



    public function signed(Request $request, $id)
    {

        $request->validate([
            'orNumber' => 'required|numeric',
        ], [
            'orNumber.required' => 'O.R Number cannot be empty',
        ]);

        $transaction = Transaction::where('id', $id)->first();
        $payment = Payment::where('id',$transaction->paymentID)->first();
        $user = Auth::user();
        $resident = Resident::where('id', $user)->first();
        $transaction->fill([
            'serviceStatus' => 'Signed',
        ]);
        $transaction->save();

        $payment->fill([
            'orNumber' => $request->orNumber,
            'remarks' => $request->remarks,
            'paymentDate' => today(),
            'receivedBy' => $user->id,
        ]);
        

        $payment->save();
        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new SignedNotification($transaction));

        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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

    public function released(Request $request, $id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $payment = Payment::where('id',$transaction->paymentID)->first();
        $document = Document::where('id', $transaction->documentID)->first();
        $user = Auth::user();
        $resident = Resident::where('id', $user)->first();
        $transaction->fill([
            'releasedBy' => $user->id,
            'releasedOn' => today(),
            'serviceStatus' => 'Released',
        ]);
        $transaction->save();

        $payment->fill([
            'orNumber' => $request->orNumber,
            'remarks' => $request->remarks,
            'paymentDate' => today(),
            'receivedBy' => $user->id,
            'paymentStatus' => 'Paid',
            'amountPaid' => $document->fee,
        ]);
        
        $payment->save();

        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new ReleasedNotification($transaction));

        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);
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

    public function docNumber($doctype){
        if ($doctype->docType == "Barangay Certificate") {
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CE']);
        } else if ($doctype->docType == "Barangay Clearance") {
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-CL']);
        } else if ($doctype->docType == "File Complain") {
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'DOC-FC']);
        } else if ($doctype->docType == "Account Information Change") {
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 10, 'prefix' => 'ACC-CHANGE']);
        }
    
        return $docId;
    }


    public function createpayment($id)
    {
        
        $payment = Payment::where('id', $id)->first();
        $transaction = Transaction::where('paymentID', $payment->id)->first();
        $document = Document::where('id',$transaction->documentID)->first();
        // return Redirect::to($payment->successURL); 
        return view('services.gcash', compact('payment','document'));
    }


    public function storepayment(Request $request , $id)
    {
        $payment = Payment::findOrFail($id);
    
        $request->validate([
            'referenceNumber' => 'required|numeric|digits:13',
            'screenshot' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ], [
            'referenceNumber.required' => 'Reference Code cannot be empty',
            'referenceNumber.numeric' => 'Reference Code must contain only numbers',
            'referenceNumber.digits' => 'Reference Code must be exactly 13 digits long',
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
            'orNumber' => NULL,
            'amountPaid' => $request->amountPaid,
            'referenceNumber' => $request->referenceNumber,
            'screenshot' => $path,
            'paymentStatus' => 'Paid',
        ]);

        // Redirect to the success page
        return view('services.success');
    }
}