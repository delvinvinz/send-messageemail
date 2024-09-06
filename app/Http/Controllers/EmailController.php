<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Email; // Pastikan model Email sudah dibuat

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::all();
        return view('emails.index', compact('emails'));
    }

    public function create()
    {
        return view('emails.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $email = Email::create($request->all());

        Mail::to($request->input('email'))->send(new SendMail($request->all()));

        return redirect()->route('emails.index')->with('success', 'Email berhasil dikirim.');
    }

    public function update(Request $request, Email $email)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'recipient_name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $email->update($request->all());

        return redirect()->route('emails.index')->with('success', 'Email berhasil diperbarui.');
    }

    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->route('emails.index')->with('success', 'Email berhasil dihapus.');
    }
}
