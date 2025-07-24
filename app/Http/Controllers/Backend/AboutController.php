<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    // Display the "About" page
    public function index()
    {
        // Get the first record from the About table
        $about = About::first();
        return view('backend.pages.about.index', compact('about'));
    }

    // 'edit page' of about section
    public function edit($id)
    {
        // Find the About record by ID
        $about = About::findOrFail($id);
        return view('backend.pages.about.edit', compact('about'));
    }

    // Update the "About" page content
    public function update(Request $request, $id)
    {
        // Find the About record by ID
        $about = About::findOrFail($id);

        // Validate the form input
        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // If a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
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

        // Redirect back to the index page.
        return redirect()->route('panel.about.index')->with('success', 'Hakkımızda bilgileri güncellendi.');
    }
}
