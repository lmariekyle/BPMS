<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\DocumentDetails;
use App\Models\Document;
use App\Models\User;
use App\Models\Transaction;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
                'paymentMethod' => $request->paymentMethod,
                'accountNumber' => 'None',
                'paymentStatus' => 'Pending',
                'successURL' => 'Not Applicable',
                'failURL' => 'Not Applicable',
            ]);
        }else{
            $payment = Payment::create([
                'paymentMethod' => $request->paymentMethod,
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
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 15, 'prefix' => 'DOC-CE']);
        }else if($document->docType == "Barangay Clearance"){
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 15, 'prefix' => 'DOC-CL']);
        }else{
            $docId = IdGenerator::generate(['table' => 'transactions', 'field' => 'docNumber', 'length' => 15, 'prefix' => 'DOC-FC']);
        }

        $date = Carbon::now()->format('Y-m-d');

        $transaction = Transaction::create([
            'documentID' => $request->documentId,
            'userID' => $user->id,
            'paymentID' => $payment->id,
            'detailID' => $detail->id,
            'serviceAmount' =>  $request->serviceAmount,
            'docNumber' => $docId,
            'serviceStatus' => "Pending Payment",
            'paymentMethod' => $request->paymentMethod,
            'issuedDocument' => "http://",
            'issuedBy' => "Null",
            'issuedOn' => $date,
        ]);


        $response = ['success' => true];
        return $response;
    }
}
