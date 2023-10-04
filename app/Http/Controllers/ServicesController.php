<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentDetails;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{

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

    public function dashboard()
    {
        $documents = Document::all();
        return view('dashboard', compact('documents'));
    }

    public function sendrequest(Request $request)
    {
        $document = DocumentDetails::create([
            'requesteeFName' => $request->requesteeFName,
            'requesteeMName' => $request->requesteeMName,
            'requesteeLName' => $request->requesteeLName,
            'requesteeEmail' => $request->requesteeEmail,
            'requesteeContactNumber' => $request->requesteeContactNumber,
            'requestPurpose' => $request->requestPurpose,
        ]);

        return view('services.request', compact('doctype',));
    }
}
