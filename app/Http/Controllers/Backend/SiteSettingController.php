<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('data', 'name')->toArray();
        return view('backend.pages.sitesetting.index', compact('settings'));
    }

    public function edit()
    {

        $settings = SiteSetting::pluck('data','name')->toArray();
        return view('backend.pages.sitesetting.edit', compact('settings'));
    }

    public function update(Request $request)
    {

        $inputs = $request->only(['phone', 'phone2', 'email', 'adres', 'harita']);


        foreach($inputs as $key => $value) {
            SiteSetting::updateOrCreate(
                ['name' => $key],
                ['data' => $value]
            );
        }

        return redirect()->back()->with('success', 'Ayarlar başarıyla güncellendi.');
    }
}
