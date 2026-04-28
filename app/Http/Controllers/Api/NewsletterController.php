<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // submitted answers
        $email = $request->email;

        // initialize variables
        if (! Newsletter::isSubscribed($email)) {
            Newsletter::subscribe($email);
        }

        return response()->json([
            'notice' => 'Welcome! You have been subscribed!',
        ]);
    }
}
