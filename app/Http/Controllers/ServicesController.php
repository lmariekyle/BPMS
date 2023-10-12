<?php

namespace App\Http\Controllers;

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
use Xendit\Xendit;
use Xendit\Configuration;
use Xendit\Invoice\Invoice;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRequestNotification;
use App\Notifications\ProcessingNotification;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{

    // public function __construct()
    // {
    //     Configuration::setXenditKey("xnd_development_6AFxxJiXEQTOK5912UFuvRYDDQxQQkn7PcPEVn7ovbIPGaYWAqza1WkhVTgiR");
    // }

    public function index()
    {
        $transactions = Transaction::all();
        foreach ($transactions as $transaction){
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y',$newtime);
        }
        return view('services.index', compact('transactions'));
    }

    public function direction($id){
        $transaction = Transaction::where('id', $id)->first();
        if($transaction->serviceStatus == 'Pending'){
            return $this->manage($id);
        }else{
            return $this->approve($id);
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
        $filePaths = json_decode( $transaction->detail->file,true);
        $transaction->payment = Payment::where('id', $transaction->paymentID)->first();
        if($transaction->payment['paymentMethod'] == 'CASH-ON-SITE' || $transaction->payment['paymentStatus'] == 'Paid'){
            $transaction->approval = 1;
        }else{
            $transaction->approval = 2;
        }
        
        return view('services.manage', compact('transaction','filePaths'));
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
    public function accepted($id){
        $transaction = Transaction::where('id', $id)->first();
        $transaction->fill([
            'serviceStatus' => 'Processing',
        ]);
        $transaction->save();

        $notifyUsers = User::where('id', $transaction->userID)->first();
        Notification::sendNow($notifyUsers, new ProcessingNotification($transaction));

        $transactions = Transaction::all();
        foreach ($transactions as $transaction){
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y',$newtime);
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
        return view('services.approve', compact('id', 'requestee'));
    }

    public function dashboard()
    {
        $documents = Document::all();
        return view('dashboard', compact('documents'));
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
        }
        $documents = Document::where('docType', $docType)->get();
        return view('services.request', compact('documents', 'doctypename', 'user'));
    }

    public function view_file($file)
{
        $extension = $file->getClientOriginalExtension;
        dd($extension);
        return response()->file(Storage::url($file), ['content-type' => 'application/pdf']);

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
            'accountNumber' => '123455678901',
            'paymentStatus' => 'Pending',
            'successURL' => NULL,
            'failURL' =>  NULL,
        ]);

        $transactionPaymentId = $transactionpayment->id;
        $transactionDetailId = $transactiondetail->id;
        $transaction->detailID = $transactionDetailId;
        $transaction->userID = $user->id;
        $transaction->paymentID = $transactionPaymentId;
        $transaction->documentID = $doctype->id;
        $transaction->serviceAmount = $request->docfee;
        $transaction->serviceStatus = 'Pending';
        $transaction->docNumber = $doctype->id;
        $transaction->paymentMethod = $request->paymentMethod;
        $transaction->issuedDocument = $request->selectedDocument;
        $transaction->issuedBy = 'Pending';
        $transaction->issuedOn = today();
        $transaction->save();

        if ($request->paymentMethod == 'GCASH') {
            $payment = Payment::where('id', $transactionPaymentId)->first();
            return view('services.gcash', compact('transaction', 'payment'));
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


    public function search(Request $request)
    { 
        $search=$request['search'];
        $documents=Document::where('docName','LIKE', "%$search%")->get();
        $transactions = Transaction::all();
        
        $count=count($transactions);
        for($x=0;$x<$count;$x++){
            foreach ($documents as $document)
            if($transactions[$x]->documentID == $document->id) {
                $user = User::where('id', $transactions[$x]->userID)->first();
                $transactions[$x]->resident = Resident::where('id', $user->residentID)->first();
                $transactions[$x]->document = Document::where('id', $transactions[$x]->documentID)->first();
                $newtime = strtotime($transactions[$x]->created_at);
                $transactions[$x]->createdDate = date('M d, Y',$newtime);
            }else{
                unset($transactions[$x]);
            }
        }
        return view('services.index')->with('transactions',$transactions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approval($id){
        $transaction = Transaction::where('id', $id)->first();
        $transaction->fill([
            'serviceStatus' => 'For Signature',
        ]);
        $transaction->save();

        $notifyUsers = User::where('userLevel', $transaction->userID)->get();

        Notification::sendNow($notifyUsers, new ProcessingNotification($transaction));

        $transactions = Transaction::all();
        foreach ($transactions as $transaction){
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y',$newtime);
        }
        return view('services.index', compact('transactions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deny($id){
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
        foreach ($transactions as $transaction){
            $user = User::where('id', $transaction->userID)->first();
            $transaction->resident = Resident::where('id', $user->residentID)->first();
            $transaction->document = Document::where('id', $transaction->documentID)->first();
            $newtime = strtotime($transaction->created_at);
            $transaction->createdDate = date('M d, Y',$newtime);
        }
        return view('services.index', compact('transactions'));
    }
}
