<?php

namespace App\Http\Controllers;

use App\Models\AccountInfoChange;
use App\Models\Complain;
use App\Models\Document;
use App\Models\DocumentDetails;
use App\Models\Payment;
use App\Models\Resident;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRequestNotification;
use App\Notifications\ProcessingNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Http;
use App\Notifications\ReleasedNotification;
use App\Notifications\SignatureNotification;
use App\Notifications\SignedNotification;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ServicesController extends Controller
{


    public function dashboard()
    {
        $documents = Document::all();
        return view('dashboard', compact('documents'));
    }

    public function index()
    {
        $transactions = Transaction::all();
        $accounts = AccountInfoChange::all();
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
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
        } else {
            if ($transaction->serviceStatus == 'Forwarded') {
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
        if ($transaction->detail && $transaction->detail->file) {
            $filePaths = json_decode($transaction->detail->file, true);
        } else {
            $filePaths = [];
        }        
        $transaction->payment = Payment::where('id', $transaction->paymentID)->first();
        if ($transaction->payment['paymentMethod'] == 'CASH-ON-SITE' || $transaction->payment['paymentStatus'] == 'Paid') {
            $transaction->approval = 1;
        } else {
            $transaction->approval = 2;
        }

        return view('services.manage', compact('transaction', 'filePaths'));
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
    public function accepted($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction->fill([
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
        $requestee = DocumentDetails::where('id', $transaction->detailID)->first();
        $doc = Document::where('id', $transaction->documentID)->first();
        return view('services.approve', compact('id', 'requestee', 'doc', 'transaction'));
    }


    public function request(string $docType)
    {
        $userAuth = Auth::user();
        $user = Resident::where('id', $userAuth->residentID)->first();
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
        return view('services.request', compact('documents', 'doctypename', 'user'));
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
        $doc = Document::where('id', $transaction->documentID)->first();
        $pdf = PDF::loadView('documents.barangaycertificate', compact('id', 'requestee', 'doc'));
        return $pdf->download('barangaycert.pdf');
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
                'accountNumber' => 'Pending',
                'paymentStatus' => 'Pending',
                'successURL' => NULL,
                'failURL' =>  NULL,
            ]);

            $transaction->issuedBy = $request->requesteeFName . ' ' . $request->requesteeLName;
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
                'paymentMethod' => $request->paymentMethod,
                'accountNumber' => NULL,
                'paymentStatus' => 'PAID',
                'successURL' => NULL,
                'failURL' =>  NULL,
            ]);

            $transaction->issuedBy = $request->complaintFName . ' ' . $request->complaintLName;
            
        } else if ($doctype->docType == "Account Information Change") {
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
            $transaction->paymentMethod = $request->paymentMethod;
            $transaction->issuedDocument = $request->selectedDocument;
            $transaction->issuedOn = today();
            $transaction->save();

            $notifyUsers = User::where('userLevel', 'Barangay Secretary')->get();

            Notification::sendNow($notifyUsers, new NewRequestNotification($transaction));
        }

        if ($request->paymentMethod == 'GCASH') {
            $payment = Payment::where('id', $transactionPaymentId)->first();
            // return view('createpayment', $transactionPaymentId);
            return $this->createpayment($payment->id);
        } else {
            return view('services.success');
        }
    }

    public function paymentrequest(Request $request)
    {

        $payment = Payment::where('id', $request->id)->first();

        if ($request->hasFile('file')) {
            if ($request->file->isValid()) {
                $file_name = Str::slug($request->successURL) . '_' . uniqid() . '.' . $request->file->getClientOriginalExtension();
                $request->file->storeAs('gcashpayments', $file_name);
                $path = "gcashpayments/" . $file_name;
            }
        } else {
            $path = NULL;
        }

        $payment->paymentMethod = 'GCASH';
        $payment->accountNumber = $request->accountNumber;
        $payment->successURL = $request->successURL;
        $payment->paymentStatus = 'Pending';
        $payment->screenshot = $path;
        $payment->failURL = NULL;
        $payment->save();

        return view('services.success');
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

        return Redirect::to($payment->successURL);
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


    public function search(Request $request)
    {
        $search = $request['search'];
        $documents = Document::where('docName', 'LIKE', "%$search%")->get();
        $transactions = Transaction::all();

        $count = count($transactions);
        for ($x = 0; $x < $count; $x++) {
            foreach ($documents as $document)
                if ($transactions[$x]->documentID == $document->id) {
                    $user = User::where('id', $transactions[$x]->userID)->first();
                    $transactions[$x]->resident = Resident::where('id', $user->residentID)->first();
                    $transactions[$x]->document = Document::where('id', $transactions[$x]->documentID)->first();
                    $newtime = strtotime($transactions[$x]->created_at);
                    $transactions[$x]->createdDate = date('M d, Y', $newtime);
                } else {
                    unset($transactions[$x]);
                }
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
        $user = Auth::user()->residentID;
        $resident = Resident::where('id', $user)->first();
        $transaction->fill([
            'serviceStatus' => 'Forwarded',
            'issuedBy' => $resident->firstName . ' ' . $resident->lastName,
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->get();
        $notifyCap = User::where('userLevel', 'Barangay Captain')->get();

        Notification::sendNow($notifyUsers, new ProcessingNotification($transaction));
        Notification::sendNow($notifyCap, new SignatureNotification($transaction));

        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
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
            $user = Auth::user()->residentID;
            $resident = Resident::where('id', $user)->first();
            $transaction->fill([
                'serviceStatus' => 'For Signature',
                'issuedBy' => $resident->firstName . ' ' . $resident->lastName,
            ]);
            $transaction->save();

            $transactions = Transaction::all();
            foreach ($transactions as $transaction) {
                $user = User::where('id', $transaction->userID)->first();
                $transaction->resident = Resident::where('id', $user->residentID)->first();
                $transaction->document = Document::where('id', $transaction->documentID)->first();
                $newtime = strtotime($transaction->created_at);
                $transaction->createdDate = date('M d, Y', $newtime);
            }
        } else {
            $transaction = Transaction::where('id', $id)->first();
            $user = Auth::user()->residentID;
            $resident = Resident::where('id', $user)->first();
            $transaction->fill([
                'serviceStatus' => 'Denied',
                'issuedBy' => $resident->firstName . ' ' . $resident->lastName,
            ]);
            $transaction->save();

            $transactions = Transaction::all();
            foreach ($transactions as $transaction) {
                $user = User::where('id', $transaction->userID)->first();
                $transaction->resident = Resident::where('id', $user->residentID)->first();
                $transaction->document = Document::where('id', $transaction->documentID)->first();
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
    public function deny($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction->fill([
            'serviceStatus' => "Not Eligible",
        ]);
        $transaction->save();

        $payment = Payment::where('id', $transaction->paymentID)->first();
        $payment->fill([
            'paymentStatus' => "Refunded",
        ]);
        $payment->save();


        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }



    public function signed($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = Auth::user()->residentID;
        $resident = Resident::where('id', $user)->first();
        $transaction->fill([
            'serviceStatus' => 'Signed',
            'issuedOn' => today(),
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new SignedNotification($transaction));

        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }

    public function released($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $user = Auth::user()->residentID;
        $resident = Resident::where('id', $user)->first();
        $transaction->fill([
            'serviceStatus' => 'Released',
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->get();
        Notification::sendNow($notifyUsers, new ReleasedNotification($transaction));

        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y', $newtime);
        }
        return view('services.index', compact('transactions'));
    }

    
}
