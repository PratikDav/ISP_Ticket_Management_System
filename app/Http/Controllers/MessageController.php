<?php

namespace App\Http\Controllers;

use App\Models\ResponseMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    /************************
    Admin Section Start
     **************************/

    public function showMessageSection()
    {

        return view('admin.pages.messaging.message');
    }
    public function sendMessageToClient(Request $request)
    {
        $msg = new ResponseMessage();

        $request->validate([

            'message' => 'required',
            'email' => 'required|email',

        ]);

        $receiver_email = User::where('email', $request->email)->where('role', 'Client')->first();

        $userEmail = Session::get('user_email');

        if ($receiver_email) {
            $msg->sent_message = $request->message;
            $msg->sender_email = $userEmail;
            $msg->receiver_email = $request->email;
            if ($msg->save()) {
                return redirect()->back()->with('success', 'Message Sent Successfully!');
            } else {
                return redirect()->back()->with('failed', 'Something Went Wrong!');

            }

        } else {
            return redirect()->back()->with('failed', 'This Email is not Registered as a Client!');

        }

    }
/************************
Admin Section End
 **************************/

/************************
Client Section Start
 **************************/

    public function showMessageSectionClient()
    {
        $response = ResponseMessage::join('users', 'response_messages.sender_email', '=', 'users.email')
            ->select('users.name as admin_name', 'response_messages.sent_message as response_messages', 'response_messages.created_at as response_created_at', 'response_messages.sender_email as sender_email', 'response_messages.receiver_email as receiver_email')
            ->orderBy('response_messages.id', 'DESC')
            ->get();
        return view('client.message.message_for_client', compact('response'));
    }

/************************
Client Section End
 **************************/

}
