<?php

namespace App\Http\Controllers\Frontend;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class PageController extends Controller
{
    public function urunler(){
         $products=Product::where('status','1')->get();
        return view('frontend.pages.products',compact('products'));
    }
    public function urundetay(){
        return view('frontend.pages.product');
    }
    public function hakkimizda(){
     $about =About::where('id',1)->first();
        return view('frontend.pages.about',compact('about'));
    }
    public function iletisim(){
        return view('frontend.pages.contact');
    }

}
