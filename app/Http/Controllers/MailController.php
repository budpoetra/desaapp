<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendRegisterMail(Request $request)
    {
        $mail = [
            'subject' => $request->subjectMail,
            'body' => $request->body,
        ];
        Mail::to($request->toMail)->send(new RegisterMail($mail));

        User::where('id', $request->user_id)->update(['status' => true]);
        return redirect('/admin/new-users')->with('success', 'User has successfully registered!');
    }
}
