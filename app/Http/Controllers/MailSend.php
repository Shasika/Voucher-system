<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;

class MailSend extends Controller
{
    public function mailtoSendGift(Request $request)
    {
        $details = [
            'title' => 'Mail From E-MarketingEye',
            'body' => $request->get('price'),
            'body1' => $request->get('validityPeriod'),
            'body2' => $request->get('validTill'),
            'body3' => $request->get('id'),
        ];
        \Mail::to($request->get('email'))->send(new SendMail($details));
        return view('emails.thanks');
    }
}
