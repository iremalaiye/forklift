<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;

class SmtpSettingController extends Controller
{
    public function edit()
    {
        $settings = SmtpSetting::first();
        return view('backend.pages.smtpsettings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'mail_mailer' => 'nullable|string',
            'mail_scheme' => 'nullable|string',
            'mail_host' => 'nullable|string',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_from_address' => 'nullable|email',
            'mail_from_name' => 'nullable|string',
        ]);

        $settings = SmtpSetting::first();

        if (!$settings) {
            SmtpSetting::create($data);
        } else {
            $settings->update($data);
        }

        return redirect()->route('panel.contacts.index')  ->with('success', 'SMTP ayarları güncellendi.');
    }
}
