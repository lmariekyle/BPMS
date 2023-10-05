<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentDetails;
use App\Models\Payment;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Xendit\Xendit;
use Xendit\Configuration;
use Xendit\Invoice\Invoice;
use Xendit\Invoice\InvoiceApi;

class ServicesController extends Controller
{

    public function __construct()
    {
        Configuration::setXenditKey("xnd_development_6AFxxJiXEQTOK5912UFuvRYDDQxQQkn7PcPEVn7ovbIPGaYWAqza1WkhVTgiR");
    }

    public function index()
    {
        return view('services.index');
    }

    public function manage()
    {
        return view('services.manage');
    }

    public function generate()
    {
        return view('services.generate');
    }

    public function approve()
    {
        return view('services.approve');
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

    public function storerequest(Request $request)
    {

        $certRequirements=[];
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    $file_name = Str::slug($request->requesteeLName) . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('requirements', $file_name);
                    $path = "requirements/" . $file_name;
                    $certRequirements[] = $path;
                }
            }
            $reqJson = json_encode($certRequirements);
        } else {
            $reqJson = NULL;
        }

        $document = DocumentDetails::create([
            'requesteeFName' => $request->requesteeFName,
            'requesteeMName' => $request->requesteeMName,
            'requesteeLName' => $request->requesteeLName,
            'requesteeEmail' => $request->requesteeEmail,
            'requesteeContactNumber' => $request->requesteeContactNumber,
            'requestPurpose' => $request->requestPurpose,
            'file' => $reqJson,
        ]);

        return Redirect::back()->with('success', 'Request has been sent!');   
    }

    public function paymentrequest(Request $request){

        
        // $params = [
        //     'external_id' => (string) Str::uuid(),
        //     'amount' => $request->amount, // Amount in cents (e.g., 100.00 PHP)
        //     'phone_number' => $request->contactNumber,
        //     'type' => 'GCASH',
        // ];
        
        Configuration::setXenditKey("xnd_development_6AFxxJiXEQTOK5912UFuvRYDDQxQQkn7PcPEVn7ovbIPGaYWAqza1WkhVTgiR");
        // Create a QR Code for GCash payment
        $params = [
            'external_id' => 'your-unique-id',
            'amount' => 10000, // Amount in cents (e.g., 100.00 PHP)
            'phone_number' => 'GCASH_PHONE_NUMBER',
            'type' => 'GCASH',
        ];
    
        try {
            $qrCode = \Xendit\QRCode::create($params);
            return view('payment.checkout', ['qrCode' => $qrCode]);
        } catch (\Xendit\Exceptions\ApiException $e) {
            // Handle API error
            return view('payment.error', ['message' => $e->getMessage()]);
        }

        // $apiInstance = new InvoiceApi();
        // $create_invoice_request = [
        //     "external_id" => "test1234",
        //     "description" => "Test Invoice",
        //     "amount" => 10000,
        //     "invoice_duration" => 172800,
        //     "currency" => "PHP",
        //     "reminder_time" => 1,
        // ];

        // try {
        //     $result = $apiInstance->createInvoice($create_invoice_request);
        //     return response()->json($result);
        // } catch (\Xendit\XenditSdkException $e) {
        //     return response()->json([
        //         'error' => 'Exception when calling InvoiceApi->createInvoice',
        //         'message' => $e->getMessage(),
        //         'full_error' => $e->getFullError(),
        //     ], 500);
        // }
        // $payment = new Payment;
        // $payment->paymentMethod = 'GCASH';
        // $payment->accountNumber = '09123456879';
        // $payment->paymentStatus = NULL;
        // $payment->successURL =$createInvoice['invoice_url'];
        // $payment->failURL =NULL;

        // $payment->save();
        // return response()->json(['data' => $createInvoice['invoice_url']]);
    }
}
