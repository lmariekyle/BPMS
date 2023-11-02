<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function mobileRequestServices(Request $request){
        $request->validate([
            'residentID' => 'required',
            'email' => 'required',
        ]);

        $userData = Resident::where('id', $request->residentID)->first();
        $userData->email = $request->email;
        $userData->token = $request->token;
        $userData->success = true;

        $documents = DB::select('select DISTINCT docType from documents');

        $response = ['user' => $userData, 'documents' => $documents, 'success' => true];
        return $response;
    }

    public function mobileGetDocuments(Request $request){
        $request->validate([
            'residentID' => 'required',
            'email' => 'required',
            'docType' => 'required',
        ]);

        $userData = Resident::where('id', $request->residentID)->first();
        $userData->email = $request->email;
        $userData->token = $request->token;

        $documents = Document::where('docType', $request->docType)->get();
        if($request->docType == 'File Complain'){
            $sitios=DB::select('select sitioName from sitios');
            $response = ['user' => $userData, 'documentType' => $request->docType ,'documents' => $documents, 'sitios' => $sitios,'success' => true];
        }else{
            $response = ['user' => $userData, 'documentType' => $request->docType ,'documents' => $documents, 'success' => true];
        }
        return $response;
    }
}
