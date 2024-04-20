<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use App\Models\Document;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use DB;

use function PHPUnit\Framework\isEmpty;

class NotificationController extends Controller
{
    public function index(){
            $notifications = auth()->user()->notifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
            $notification->payment = Payment::where('id',$notification->data['transaction']['paymentID'])->first();
            if($notification->data['transaction']['releasedBy'] != null){
                if($notification->data['transaction']['releasedBy'] == "Not Applicable"){
                    if($notification->data['transaction']['endorsedBy'] == "Not Applicable"){
                        $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
                    }else{
                        $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
                    }
                } else {
                    $notification->processedBy = User::where('id',$notification->data['transaction']['releasedBy'])->first();
                }
            } else if($notification->data['transaction']['approvedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['approvedBy'])->first();
            } else if($notification->data['transaction']['endorsedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
            } else {
                $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
            }
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();  
            $notification->processedByUser->makeVisible('firstName', 'middleName', 'lastName');
            if($notification->data['transaction']['remarks'] == null){
                $notification->remarks = "No Remarks";
            }else{
                $notification->remarks = $notification->data['transaction']['remarks'];
            }
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
            $notification->payment = Payment::where('id',$notification->data['transaction']['paymentID'])->first();
            if($notification->data['transaction']['releasedBy'] != null){
                if($notification->data['transaction']['releasedBy'] == "Not Applicable"){
                    if($notification->data['transaction']['endorsedBy'] == "Not Applicable"){
                        $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
                    }else{
                        $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
                    }
                } else {
                    $notification->processedBy = User::where('id',$notification->data['transaction']['releasedBy'])->first();
                }
            } else if($notification->data['transaction']['approvedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['approvedBy'])->first();
            } else if($notification->data['transaction']['endorsedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
            } else {
                $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
            }
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();  
            $notification->processedByUser->makeVisible('firstName', 'middleName', 'lastName');
            if($notification->data['transaction']['remarks'] == null){
                $notification->remarks = "No Remarks";
            }else{
                $notification->remarks = $notification->data['transaction']['remarks'];
            }
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
        $notification->payment = Payment::where('id',$notification->data['transaction']['paymentID'])->first();
        if($notification->data['transaction']['releasedBy'] != null){
            if($notification->data['transaction']['releasedBy'] == "Not Applicable"){
                if($notification->data['transaction']['endorsedBy'] == "Not Applicable"){
                    $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
                }else{
                    $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
                }
            } else {
                $notification->processedBy = User::where('id',$notification->data['transaction']['releasedBy'])->first();
            }
        } else if($notification->data['transaction']['approvedBy'] != null){
            $notification->processedBy = User::where('id',$notification->data['transaction']['approvedBy'])->first();
        } else if($notification->data['transaction']['endorsedBy'] != null){
            $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
        } else {
            $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
        }
        $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
        $notification->processedByUser->makeVisible('firstName', 'middleName', 'lastName');
        if($notification->data['transaction']['remarks'] == null){
            $notification->remarks = "No Remarks";
        }else{
            $notification->remarks = $notification->data['transaction']['remarks'];
        }
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
            $notification->payment = Payment::where('id',$notification->data['transaction']['paymentID'])->first();
            if($notification->data['transaction']['releasedBy'] != null){
                if($notification->data['transaction']['releasedBy'] == "Not Applicable"){
                    if($notification->data['transaction']['endorsedBy'] == "Not Applicable"){
                        $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
                    }else{
                        $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
                    }
                } else {
                    $notification->processedBy = User::where('id',$notification->data['transaction']['releasedBy'])->first();
                }
            } else if($notification->data['transaction']['approvedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['approvedBy'])->first();
            } else if($notification->data['transaction']['endorsedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
            } else {
                $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
            }
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
            $notification->processedByUser->makeVisible('firstName', 'middleName', 'lastName');
            if($notification->data['transaction']['remarks'] == null){
                $notification->remarks = "No Remarks";
            }else{
                $notification->remarks = $notification->data['transaction']['remarks'];
            }
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
            $notification->payment = Payment::where('id',$notification->data['transaction']['paymentID'])->first();
            if($notification->data['transaction']['releasedBy'] != null){
                if($notification->data['transaction']['releasedBy'] == "Not Applicable"){
                    if($notification->data['transaction']['endorsedBy'] == "Not Applicable"){
                        $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
                    }else{
                        $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
                    }
                } else {
                    $notification->processedBy = User::where('id',$notification->data['transaction']['releasedBy'])->first();
                }
            } else if($notification->data['transaction']['approvedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['approvedBy'])->first();
            } else if($notification->data['transaction']['endorsedBy'] != null){
                $notification->processedBy = User::where('id',$notification->data['transaction']['endorsedBy'])->first();
            } else {
                $notification->processedBy = User::where('id',$notification->data['transaction']['userID'])->first();
            }
            $notification->processedByUser = Resident::where('id',$notification->processedBy['residentID'])->first();
            $notification->processedByUser->makeVisible('firstName', 'middleName', 'lastName');
            if($notification->data['transaction']['remarks'] == null){
                $notification->remarks = "No Remarks";
            }else{
                $notification->remarks = $notification->data['transaction']['remarks'];
            }
            $newtime = strtotime($notification->data['transaction']['created_at']);
            $notification->notificationCreated = date('M d, Y', $newtime);
        }
        $response = ['success' => true,'notifications' => $notifications];
        return $response;
    }
}

?>