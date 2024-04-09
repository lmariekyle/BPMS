<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use DB;

class NotificationController extends Controller
{
    public function index(){
            $notifications = auth()->user()->notifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
            $notification->processedBy = User::where('id',$notification->data['transaction']['issuedBy'])->first();
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
            $newtime = strtotime($notification->data['transaction']['created_at']);
            $notification->notificationCreated = date('M d, Y', $newtime);
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
            $notification->processedBy = User::where('id',$notification->data['transaction']['issuedBy'])->first();
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
            $newtime = strtotime($notification->data['transaction']['created_at']);
            $notification->notificationCreated = date('M d, Y', $newtime);
        }
        $response = ['success' => true,'notifications' => $notifications];
        return $response;
    }

    public function mobileNotificationDetails(Request $request){
        $notification = DatabaseNotification::where('id',$request->id)->first();
        $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
        $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
        $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
        $notification->processedBy = User::where('id',$notification->data['transaction']['issuedBy'])->first();
        $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
        $notification->processedByUser->makeVisible('firstName', 'middleName', 'lastName');
        $newtime = strtotime($notification->data['transaction']['created_at']);
        $notification->notificationCreated = date('M d, Y', $newtime);
        $response = ['notifications' => $notification, 'success' => true,];
        return $response;
    }

    public function markRead($id){
        $notification = DatabaseNotification::where('id', $id)->first();
        $notification->read_at = today();
        $notification->save();

        return response()->noContent();
    }

    public function destroy($id){
        $notification = DatabaseNotification::where('id', $id)->first();
        if($notification != null){
            $notification->delete();
        }

        $notifications = auth()->user()->notifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
            $notification->processedBy = User::where('id',$notification->data['transaction']['issuedBy'])->first();
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
            $newtime = strtotime($notification->data['transaction']['created_at']);
            $notification->notificationCreated = date('M d, Y', $newtime);
        }
        return view('auth.notifications', compact('notifications'));
    }

    public function mobileDeleteNotifications(Request $request){
        $notification = DatabaseNotification::where('id', $request->notificationID)->first();
        $notification->delete();

        $user = User::where('id', $request->residentID)->first();
        $notifications = $user->notifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
            $notification->processedBy = User::where('id',$notification->data['transaction']['issuedBy'])->first();
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
            $notification->processedByUser->makeVisible('firstName', 'middleName', 'lastName');
            $newtime = strtotime($notification->data['transaction']['created_at']);
            $notification->notificationCreated = date('M d, Y', $newtime);
        }
        $response = ['success' => true,'notifications' => $notifications];
        return $response;
    }
}

?>