<?php

namespace App\Http\Controllers;
use App\Models\EmailSetting;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function saveAdminEmail(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email',
        ]);

        EmailSetting::updateOrCreate(
            ['key' => 'admin_email'],
            ['value' => $request->admin_email]
        );

        return redirect()->back()->with('success', 'Admin mail adresi kaydedildi.');
    }
    public function showAdminEmailForm()
    {
        $adminEmail = EmailSetting::where('key', 'admin_email')->value('value');
        return view('admin.email-settings', compact('adminEmail'));
    }
}


