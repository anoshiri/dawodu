<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SentNotification;
use App\Models\Message;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {

        // validate request
        $param = $request->validate([
            'fullName' => 'required',
            'subject' => 'required|min:5',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        /*** Prepare mail for sending */
        // send notification to admin
        $param = (object) $param;

        $param->template = 'contact_confirmation';
        $param->subject = 'Message from contact form.';

        $param->message = 'Sender name - '.$request->fullName.'<br />';
        $param->message .= 'Sender email - '.$request->email.'<br />';
        $param->message .= 'Message:'.'<br />'.$request->message;

        // get setting emails
        $to = app(GeneralSettings::class)->email ?? 'info@dawodu.com';

        Mail::to($to)
            ->send(new SentNotification($param));
        // save or sent message

        // output message
        // $request->message = 'Thanks! We have received your message.';
        $message = Message::where('slug', 'contact_sent_message')->first()->content ?? 'Message Sent! Thank you for contacting us!';
        $message = strip_tags($message);

        return response()->json([
            'notice' => $message,
        ]);
    }
}
