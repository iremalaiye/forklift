<?php

namespace App\Http\Controllers\Frontend;
use App\Models\About;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Product;
class PageController extends Controller
{
    public function urunler(){
         $products=Product::where('status','1')->paginate(10);
        return view('frontend.pages.products',compact('products'));
    }
    public function urundetay($slug){

       $product=Product::whereSlug($slug)->first();
        return view('frontend.pages.product',compact('product'));
    }
    public function hakkimizda(){
     $about =About::where('id',1)->first();
     
        $services = Services::where('status', '1')->latest()->take(8)->get();
        return view('frontend.pages.about',compact('about','services'));
    }
    public function iletisim(){
        return view('frontend.pages.contact');
    }

}
