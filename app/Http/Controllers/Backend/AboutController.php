<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('backend.pages.about.index', compact('about'));
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('backend.pages.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        if ($request->hasFile('image')) {
            // delete old one
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            // add new image
            $imagePath = $request->file('image')->store('uploads/about', 'public');
            $data['image'] = 'storage/' . $imagePath;
        } else {
            // if there is no new image,add old one
            $data['image'] = $about->image;
        }

        $about->update($data);

        return redirect()->route('panel.about.index')->with('success', 'Hakkımızda bilgileri güncellendi.');
    }
}
