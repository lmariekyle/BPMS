<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangay;
use App\Models\Sitio;
use Illuminate\Support\Facades\Auth;

class SitioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitios = Sitio::where('id', '>', 1)->paginate(10);   
        
        foreach ($sitios as $sitio) {
            $barangay = Barangay::where('id', $sitio->barangayID)->first();
            $sitio->barangayName = $barangay->barangayName;
        }
        
        return view('sitio.index')->with('sitios', $sitios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crud = "create";
        $barangays = Barangay::where('id', '>', 1)->get();
        return view('sitio.edit', compact('barangays', 'crud'));
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
            'sitioName' => ['required', 'regex:/^[a-zA-Z\s]+$/u','max:24'],
            'barangayID' => ['required', 'numeric'],
        ]);

        $user = Auth::user();
        Sitio::create([
            'sitioName' => $request->sitioName,
            'barangayID' => $request->barangayID,
            'createdBy' => $user->id,
            'revisedBy' => $user->id,
        ]);

        $sitios = Sitio::where('id', '>', 1)->paginate(10);   
        
        foreach ($sitios as $sitio) {
            $barangay = Barangay::where('id', $sitio->barangayID)->first();
            $sitio->barangayName = $barangay->barangayName;
        }
        
        return view('sitio.index')->with('sitios', $sitios);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sitio = Sitio::where('id', $id)->first();    
        $barangay = Barangay::where('id', $sitio->barangayID)->first();
        $sitio->barangayName = $barangay->barangayName;    
        
        return view('sitio.show',compact('sitio'));
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
        $sitio = Sitio::where('id', $id)->first();   
        $barangays = Barangay::where('id', '>', 1)->where('id', '!=', $sitio->barangayID)->get();
        
        $sBarangay = Barangay::where('id', $sitio->barangayID)->value('barangayName');
        
        return view('sitio.edit', compact('sitio', 'barangays', 'sBarangay','crud'));
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
            'sitioName' => ['required', 'regex:/^[a-zA-Z\s]+$/u','max:24'],
            'barangayID' => ['required', 'numeric'],
        ]);

        $user = Auth::user();
        $sitio = Sitio::find($id);
        $sitio->fill([
            'sitioName' => $request->sitioName,
            'barangayID' => $request->barangayID,
            'revisedBy' => $user->id,
        ]);
        $sitio->save();

        $sitios = Sitio::where('id', '>', 1)->paginate(10);   
        
        foreach ($sitios as $sitio) {
            $barangay = Barangay::where('id', $sitio->barangayID)->first();
            $sitio->barangayName = $barangay->barangayName;
        }
        
        return view('sitio.index')->with('sitios', $sitios);
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
