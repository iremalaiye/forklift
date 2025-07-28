<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{

    // Show the "About" page in the admin panel
    public function index()
    {
        // Get the first about record
        $about = About::first();
        // Pass the data to the view
        return view('backend.pages.about.index', compact('about'));
    }


    // 'edit page' of about section
    public function edit($id)
    {
        // Find the About record by ID
        $about = About::findOrFail($id);
        // Pass the data to the edit view
        return view('backend.pages.about.edit', compact('about'));
    }


    // Update the "About" page content
    public function update(Request $request, $id)
    {
        // Find the About record by ID
        $about = About::findOrFail($id);

        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // If a new image was uploaded
        if ($request->hasFile('image')) {
            // If there is an old image, delete it from storage
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            // Store the new image
            $imagePath = $request->file('image')->store('uploads/about', 'public');
            $data['image'] = 'storage/' . $imagePath;
        } else {
            // If no new image, keep the existing one
            $data['image'] = $about->image;
        }

        // Update the About record with the new data
        $about->update($data);

        // Redirect back to the about index page.
        return redirect()->route('panel.about.index')->with('success', 'Hakkımızda bilgileri güncellendi.');
    }
}
