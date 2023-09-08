<?php

namespace App\Http\Controllers;

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

    public function deny()
    {
        return view('services.deny');
    }
}

?>