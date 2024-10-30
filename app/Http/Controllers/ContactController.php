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
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Mengambil data dari request dan memastikan setiap elemen berupa string
        $data = [
            'name' => (string) $request->input('name'),
            'email' => (string) $request->input('email'),
            'subject' => (string) $request->input('subject'),
            'message' => (string) $request->input('message'),
        ];

        // Mengirim email
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('selfianasari0@gmail.com')
                    ->subject($data['subject'])
                    ->from($data['email'], $data['name']);
        });

        // Mengirim pesan sukses kembali ke form
        return back()->with('success', 'Pesan Anda telah terkirim.');
    }
}
