<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInformation;
class ContactInformationController extends Controller
{
    public function index()
    {
        $settings = ContactInformation::pluck('data', 'name')->toArray();
        return view('backend.pages.contactinformation.index', compact('settings'));
    }

    public function edit()
    {

        $settings = ContactInformation::pluck('data','name')->toArray();
        return view('backend.pages.contactinformation.edit', compact('settings'));
    }

    public function update(Request $request)
    {

        $inputs = $request->only(['phone', 'phone2', 'email', 'adres', 'harita']);



        foreach($inputs as $key => $value) {
            ContactInformation::updateOrCreate(
                ['name' => $key],
                ['data' => $value]
            );

        }

        return redirect()->route('panel.contactinformation.index')->with('success', 'İletişim bilgileri başarıyla güncellendi.');
    }
}
