<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Slider;
use App\Models\Product;
use App\Models\About;
class PageHomeController extends Controller
{

    // Display the homepage with active slider, services, and products
    public function anasayfa(){

        $sliders = \App\Models\Slider::where('status', '1')->get();
        $title='Anasayfa';
        $services = Services::where('status', '1')->latest()->take(8)->get();
        $products = Product::where('status', '1')->latest()->take(8)->get();

      //seo
        $seolists = metaolustur('anasayfa');

        $seo = [
            'title' =>  $seolists['title'] ?? '',
            'description' => $seolists['description'] ?? '',
            'keywords' => $seolists['keywords'] ?? '',
            'image' => asset('img/page-bg.jpg'),
            'url'=>  $seolists['currenturl'],
            'canonical'=> $seolists['trpage'],
            'robots' => 'index, follow',
        ];


        return view('frontend.pages.index',compact('seo','sliders','title','services','products'));
    }
}
