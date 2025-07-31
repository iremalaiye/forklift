<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactLabel;
class ContactLabelController extends Controller
{
    public function index()
    {
        $label = ContactLabel::first();
        return view('backend.pages.contactlabels.index', compact('label'));
    }

    public function edit()
    {
        $label = ContactLabel::first();
        return view('backend.pages.contactlabels.edit', compact('label'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'form_title' => 'nullable|string',
            'name_label' => 'nullable|string',
            'surname_label' => 'nullable|string',
            'email_label' => 'nullable|string',
            'subject_label' => 'nullable|string',
            'message_label' => 'nullable|string',
            'submit_button_label' => 'nullable|string',
        ]);

        $label = ContactLabel::first();
        if (!$label) {
            $label = ContactLabel::create($data);
        } else {
            $label->update($data);
        }

        return redirect()->route('panel.contactlabels.index')->with('success', 'İletişim etiketleri başarıyla güncellendi.');
    }
}
