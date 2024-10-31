<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showForm()
    {
        $complaints = Complaint::all();
        return view('contact', compact('complaints'));
    }

    public function send(Request $request)
{
    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'contactMessage' => $request->input('message') // Pastikan variabel ini ada
    ];

    Mail::send('emails.contact', $data, function($message) use ($data) {
        $message->to('selfianasari0@gmail.com')
                ->subject($data['subject']);
    });

    return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
}

}
