<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Resident;
use App\Models\User;
use App\Models\Transaction;
use App\Models\DocumentDetails;
use App\Models\Payment;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

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
        $transaction->payment = Payment::where('id', $transaction->paymentID)->first();
        if($transaction->payment['paymentMethod'] == 1){
            $transaction->payment['paymentMethodOption'] = "Cash On-Site";
        }else{
            $transaction->payment['paymentMethodOption'] = "GCash";
        }
        if($transaction->payment['paymentMethod'] == 1 || $transaction->payment['paymentStatus'] == 'Paid'){
            $transaction->approval = 1;
        }else{
            $transaction->approval = 2;
        }
        
        return view('services.manage', compact('transaction'));
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
    public function approve($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $requestee = DocumentDetails::where('id', $transaction->detailID)->first();
        return view('services.approve', compact('id', 'requestee'));
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

    
    public function request()
    {
        return view('services.request');
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

?>