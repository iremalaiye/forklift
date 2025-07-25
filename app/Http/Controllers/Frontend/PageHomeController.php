<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Slider;
use App\Models\Product;
use App\Models\About;
class PageHomeController extends Controller
{
    public function anasayfa(){
      $slider = Slider::where('status','1')->first();
      $title='Anasayfa';
        $services = Services::where('status', '1')->latest()->take(8)->get();
        $products = Product::where('status', '1')->latest()->take(8)->get();
        return view('frontend.pages.index',compact('slider','title','services','products'));
    }
}
