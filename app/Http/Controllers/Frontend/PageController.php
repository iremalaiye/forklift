<?php

namespace App\Http\Controllers\Frontend;
use App\Models\About;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Product;
class PageController extends Controller
{

    // Display a paginated list of active products
    public function urunler(){
         $products=Product::where('status','1')->paginate(10);
        return view('frontend.pages.products',compact('products'));
    }


    // Display detailed information about a product based on its slug
    public function urundetay($slug){

       $product=Product::whereSlug($slug)->first();
        return view('frontend.pages.product',compact('product'));
    }


    // Show the 'About' page with  company info and a list of active services
    public function hakkimizda(){
     $about =About::where('id',1)->first();

        $services = Services::where('status', '1')->latest()->take(8)->get();
        return view('frontend.pages.about',compact('about','services'));
    }


    // Show the contact page
    public function iletisim(){
        return view('frontend.pages.contact');
    }

}
