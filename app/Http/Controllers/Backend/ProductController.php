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

    public function index()
    {
        $products = Product::all();
        return view('backend.pages.products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('backend.pages.products.edit');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $resim = $request->file('image');
            $dosyaadi = time() . '-' . Str::slug($request->model) . '.' . $resim->getClientOriginalExtension();
            $resim->move(public_path('img/products'), $dosyaadi);
        }

        Product::create([
            'model' => $request->model,
            'slug' => Str::slug($request->model),
            'capacity' => $request->capacity,
            'description' => $request->description,
            'status' => $request->status,
            'image' => isset($dosyaadi) ? 'img/products/' . $dosyaadi : null,
        ]);

        return back()->withSuccess('Ürün başarıyla eklendi!');
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
        $product = Product::findOrFail($id);
        return view('backend.pages.products.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'capacity' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // eski resmi sil
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $resim = $request->file('image');
            $dosyaadi = time() . '-' . Str::slug($request->model) . '.' . $resim->getClientOriginalExtension();
            $resim->move(public_path('img/products'), $dosyaadi);
        }

        $product->update([
            'model' => $request->model,
            'slug' => Str::slug($request->model),
            'capacity' => $request->capacity,
            'description' => $request->description,
            'status' => $request->status,
            'image' => isset($dosyaadi) ? 'img/products/' . $dosyaadi : $product->image,
        ]);

        return back()->withSuccess('Ürün başarıyla güncellendi!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return back()->withSuccess('Ürün başarıyla silindi!');
    }
}
