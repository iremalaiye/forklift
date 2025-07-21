<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\About;
class PageHomeController extends Controller
{
    public function anasayfa(){
      $slider = Slider::where('status','1')->first();
      $title='Anasayfa';
      $about=About::where('id',1)->first();
        $products = Product::where('status', '1')->latest()->take(8)->get();
        return view('frontend.pages.index',compact('slider','title','about','products'));
    }
}
