<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangay;
use Illuminate\Support\Facades\Auth;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangays = Barangay::where('id', '>', 1)->paginate(10);        
        
        return view('barangay.index')->with('barangays',$barangays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crud = "create";
        return view('barangay.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barangayName' => ['required', 'regex:/^[a-zA-Z\s]+$/u','max:24'],
            'municipality' => ['required', 'regex:/^[a-zA-Z\s]+$/u','max:24'],
            'zipCode' => ['required', 'numeric', 'digits:4'],
            'HLocation' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        Barangay::create([
            'barangayName' => $request->barangayName,
            'municipality' => $request->municipality,
            'zipCode' => $request->zipCode,
            'HLocation' => $request->HLocation,
            'createdBy' => $user->id,
            'revisedBy' => $user->id,
        ]);

        $barangays = Barangay::where('id', '>', 1)->paginate(10);        
        
        return view('barangay.index')->with('barangays',$barangays);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangay = Barangay::where('id', $id)->first();        
        
        return view('barangay.show',compact('barangay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud = "edit";
        $barangay = Barangay::where('id', $id)->first();   
        
        return view('barangay.edit', compact('barangay','crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barangayName' => ['required', 'regex:/^[a-zA-Z\s]+$/u','max:24'],
            'municipality' => ['required', 'regex:/^[a-zA-Z\s]+$/u','max:24'],
            'zipCode' => ['required', 'numeric', 'digits:4'],
            'HLocation' => ['required', 'string', 'max:255'],
        ]);


        $user = Auth::user();
        $barangay = Barangay::find($id);

        $barangay->fill([
            'barangayName' => $request->barangayName,
            'municipality' => $request->municipality,
            'zipCode' => $request->zipCode,
            'HLocation' => $request->HLocation,
            'revisedBy' => $user->id,
        ]);
        $barangay->save();

        $barangays = Barangay::where('id', '>', 1)->paginate(10);        
        
        return view('barangay.index')->with('barangays',$barangays);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
