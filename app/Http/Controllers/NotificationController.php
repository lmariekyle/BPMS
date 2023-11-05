<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index(){
            $notifications = auth()->user()->notifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
        }
        return view('auth.notifications', compact('notifications'));
    }

    public function mobileNotifications(Request $request){
        $user = User::where('residentID', $request->residentID)->first();
        $notifications = $user->notifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
        }
        $response = ['notifications' => $notifications, 'success' => true];
        return $response;
    }

    public function markRead($id){
        $notification = DatabaseNotification::where('id', $id)->first();
        $notification->read_at = today();
        $notification->save();

        return response()->noContent();
    }
}

?>