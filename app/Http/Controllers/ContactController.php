<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'c_fname' => 'required|string',
            'c_lname' => 'required|string',
            'c_email' => 'required|email',
        ]);

        Contact::create([
            'first_name' => $request->c_fname,
            'last_name' => $request->c_lname,
            'email' => $request->c_email,
            'subject' => $request->c_subject,
            'message' => $request->c_message,
        ]);

        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi.');}



    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('backend.pages.messages.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.pages.messages.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('panel.contacts.index')->with('success', 'Mesaj başarıyla silindi.');
    }



}
