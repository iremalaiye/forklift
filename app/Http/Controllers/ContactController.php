<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Setting;
class ContactController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'c_fname' => 'required|string',
            'c_lname' => 'required|string',
            'c_email' => 'required|email',
            'c_subject' => 'nullable|string',
            'c_message' => 'nullable|string',
        ]);

        $data = [
            'first_name' => $request->c_fname,
            'last_name' => $request->c_lname,
            'email' => $request->c_email,
            'subject' => $request->c_subject,
            'message' => $request->c_message,
        ];


        Contact::create($data);

        $adminEmail = Setting::where('key', 'admin_email')->value('value');

        if($adminEmail) {
            Mail::to($adminEmail)->send(new ContactMail($data));
        } else {

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));
        }

        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi.');
    }




    // show messages page in admin panel.
    public function index()
    {
        // Get the latest contact messages with pagination
        $contacts = Contact::latest()->paginate(10);
        return view('backend.pages.messages.index', compact('contacts'));
    }


    public function show($id)
    {
        // Find the contact message by ID or fail
        $contact = Contact::findOrFail($id);
        return view('backend.pages.messages.show', compact('contact'));
    }


    public function destroy($id)
    {
        // Find and delete the contact message
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // Redirect to contact index page with success message
        return redirect()->route('panel.contacts.index')->with('success', 'Mesaj başarıyla silindi.');
    }



}
