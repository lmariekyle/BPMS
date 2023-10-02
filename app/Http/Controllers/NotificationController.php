<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class NotificationController extends Controller
{
    public function index(){
        return view('notifications');
    }
}

?>