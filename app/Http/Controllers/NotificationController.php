<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use App\Models\Document;

class NotificationController extends Controller
{
    public function index(){
        // $notifications = [
        //     'unread' => auth()->user()->unreadnotifications,
        //     'read' => auth()->user()->notifications->whereNotNull('read_at')->get(),
        // ];
            $notifications = auth()->user()->notifications;
        // $notifications = auth()->user()->unreadNotifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
        }
        return view('auth.notifications', compact('notifications'));
    }
}

?>