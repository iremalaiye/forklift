<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Str;

class ServiceController extends Controller
{

    // Display the "Service" page
    public function index()
    {
        $services = Services::all();
        return view('backend.pages.services.index', compact('services'));
    }


    // 'edit page' of services section
    public function edit(string $id)
    {
        // Find the Services record by ID
        $service = Services::findOrFail($id);
        return view('backend.pages.services.edit', compact('service'));
    }



    // create new service
    public function create()
    {
        return view('backend.pages.services.edit');
    }

    // store service
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        Services::create([
            'text' => $request->text,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()->route('panel.services.index')->with('success', 'Hizmetlerimiz başarıyla eklendi');
    }


    // Update the "services" page content
    public function update(Request $request, string $id)
    {
        // Find the services record by ID
        $service = Services::findOrFail($id);

        // Validate the form input
        $request->validate([
            'text' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        // Update the services record with the new data
        $service->update([
            'text' => $request->text,
            'content' => $request->content,
            'status' => $request->status,
        ]);
        // Redirect back to the index page.
        return redirect()->route('panel.services.index')->with('success', 'Hizmetlerimiz başarıyla güncellendi');
    }



    // delete service
    public function destroy(string $id)
    {
        $service = Services::findOrFail($id);
        $service->delete();

        return back()->withSuccess('Hizmet başarıyla silindi!');
    }

    // update status (active/passiveoggle)
    public function status(Request $request)
    {
        $update = filter_var($request->statu, FILTER_VALIDATE_BOOLEAN);
        $updateString = $update ? '1' : '0';

        Services::where('id', $request->id)->update(['status' => $updateString]);

        return response(['error' => false, 'status' => $updateString]);
    }



}
