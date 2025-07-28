<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    //show the products page of admin panel
    public function index()
    {
        // take all products
        $products = Product::all();
        // Pass the products to the view
        return view('backend.pages.products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */

    // Show the product creation form
    public function create()
    {
        return view('backend.pages.products.edit');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'model' => 'required|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            $resim = $request->file('image');
            // Create a file name using current time and model name
            $dosyaadi = time() . '-' . Str::slug($request->model) . '.' . $resim->getClientOriginalExtension();
            // Move the image to the public path
            $resim->move(public_path('img/products'), $dosyaadi);
        }

        // Create the product record in the database
        Product::create([
            'model' => $request->model,
            'slug' => Str::slug($request->model),
            'capacity' => $request->capacity,
            'content' => $request->content,
            'title'=>$request->title,
            'description'=>$request->description,
            'keywords'=>$request->keywords,
            'status' => $request->status,
            'image' => isset($dosyaadi) ? 'img/products/' . $dosyaadi : null,
        ]);

        // Redirect to the product index page
        return redirect()->route('panel.products.index')->with('success', 'Ürün başarıyla eklendi');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the product by ID or fail
        $product = Product::findOrFail($id);
        // Pass product to the edit view
        return view('backend.pages.products.edit', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input data
        $request->validate([
            'model' => 'required|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        // Find the product to update
        $product = Product::findOrFail($id);

        //  image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $resim = $request->file('image');
            $dosyaadi = time() . '-' . Str::slug($request->model) . '.' . $resim->getClientOriginalExtension();
            $resim->move(public_path('img/products'), $dosyaadi);
        }

        // Update the product record
        $product->update([
            'model' => $request->model,
            'slug' => Str::slug($request->model),
            'capacity' => $request->capacity,
            'content' => $request->content,
            'title'=>$request->title,
            'description'=>$request->description,
            'keywords'=>$request->keywords,
            'status' => $request->status,
            'image' => isset($dosyaadi) ? 'img/products/' . $dosyaadi : $product->image,
        ]);

        // Redirect to the index page
        return redirect()->route('panel.products.index')->with('success', 'Ürün başarıyla güncellendi!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the image file if it exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        // Delete the product from the database
        $product->delete();

        // Return back with success message
        return back()->withSuccess('Ürün başarıyla silindi!');
    }


    public function status(Request $request)
    {
        // Convert the status to boolean and then to string
        $update = filter_var($request->statu, FILTER_VALIDATE_BOOLEAN);
        $updateString = $update ? '1' : '0';

        // Update the status in the database
        Product::where('id', $request->id)->update(['status' => $updateString]);

        // Return a JSON response
        return response(['error' => false, 'status' => $updateString]);
    }

}
