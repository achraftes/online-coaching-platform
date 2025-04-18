<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->message
        ];

        Mail::to('achraf04chke@gmail.com')->send(new \App\Mail\ContactMessage($details));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
