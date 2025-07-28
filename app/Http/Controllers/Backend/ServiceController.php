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
        // take all services
        $services = Services::all();
        // Pass the data to the services index view
        return view('backend.pages.services.index', compact('services'));
    }


    // 'edit page' of services section
    public function edit(string $id)
    {
        // Find the service by ID or fail if not found
        $service = Services::findOrFail($id);
        // Load the edit form
        return view('backend.pages.services.edit', compact('service'));
    }


    // create new service
    public function create()
    {
        // Return the service creation form
        return view('backend.pages.services.edit');
    }


    // store service
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'text' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        // Create a new service record
        Services::create([
            'text' => $request->text,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        // Redirect to the services index page
        return redirect()->route('panel.services.index')->with('success', 'Hizmetlerimiz başarıyla eklendi');
    }


    // Update the "services" page content
    public function update(Request $request, string $id)
    {
        // Find the service by ID or fail
        $service = Services::findOrFail($id);

        // Validate updated data
        $request->validate([
            'text' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        // Update the service with the new data
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
        // Find the service by ID or fail
        $service = Services::findOrFail($id);

        // Delete the service
        $service->delete();

        // Redirect back with success message
        return back()->withSuccess('Hizmet başarıyla silindi!');
    }


    // update status (active/passivetoggle)
    public function status(Request $request)
    {
        // Convert input status to boolean and then to string
        $update = filter_var($request->statu, FILTER_VALIDATE_BOOLEAN);
        $updateString = $update ? '1' : '0';


        // Update the status in the database
        Services::where('id', $request->id)->update(['status' => $updateString]);

        // Return a JSON response
        return response(['error' => false, 'status' => $updateString]);
    }



}
