<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Services;

class ServiceController extends Controller
{

    // Display the "About" page
    public function index()
    {
        $services = Services::first();
        return view('backend.pages.services.index', compact('services'));
    }

    // 'edit page' of about section
    public function edit($id)
    {
        // Find the About record by ID
        $services = Services::findOrFail($id);
        return view('backend.pages.services.edit', compact('services'));
    }

    // Update the "About" page content
    public function update(Request $request, $id)
    {
        // Find the About record by ID
        $services = Services::findOrFail($id);

        // Validate the form input
        $data = $request->validate([

            'text_1_icon' => 'nullable|string',
            'text_1' => 'nullable|string',
            'text_1_content' => 'nullable|string',
            'text_2_icon' => 'nullable|string',
            'text_2' => 'nullable|string',
            'text_2_content' => 'nullable|string',
            'text_3_icon' => 'nullable|string',
            'text_3' => 'nullable|string',
            'text_3_content' => 'nullable|string',
        ]);



        // Update the About record with the new data
        $services->update($data);

        // Redirect back to the index page.
        return redirect()->route('panel.services.index')->with('success', 'Hakkımızda bilgileri güncellendi.');
    }

}
