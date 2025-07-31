<?php

namespace App\Http\Controllers\Frontend;
use App\Models\About;
use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ContactLabel;
class PageController extends Controller
{

    // Display a paginated list of active products
    public function urunler(){
         $products=Product::where('status','1')->paginate(10);

    //seo
        $seolists = metaolustur('urunler');

        $seo = [
            'title' =>  $seolists['title'] ?? '',
            'description' => $seolists['description'] ?? '',
            'keywords' => $seolists['keywords'] ?? '',
            'image' => asset('img/page-bg.jpg'),
            'url'=>  $seolists['currenturl'],
            'canonical'=> $seolists['trpage'],
            'robots' => 'index, follow',
        ];

        return view('frontend.pages.products',compact('seo','products'));



    }


    // Display detailed information about a product based on its slug
    public function urundetay($slug){


        $product = Product::whereSlug($slug)->firstOrFail();

        //seo
        $title = $product->title ?: ($product->model . '-' . config('app.name'));
        $description = 'Bu güzel '.$product->model.' ürünü '.config('app.name'). 'dan hemen kiralayın';
        $seodesciption = $product->description ?? $description;



        $seo = [
            'title' => $title ?? '',
            'description' =>   $seodesciption?? '',
            'keywords' => $product->keywords ?? '',
            'image' => asset($product->image),
            'url'=>  route('urundetay',$product->slug),
            'canonical'=> route('urundetay',$product->slug),
            'robots' => 'index, follow',
        ];



        return view('frontend.pages.product',compact('seo','product'));
    }


    // Show the 'About' page with  company info and a list of active services
    public function hakkimizda(){
     $about =About::where('id',1)->first();

        $services = Services::where('status', '1')->latest()->take(8)->get();

        //seo
        $seolists = metaolustur('hakkimizda');

        $seo = [
            'title' =>  $seolists['title'] ?? '',
            'description' => $seolists['description'] ?? '',
            'keywords' => $seolists['keywords'] ?? '',
            'image' => asset('img/page-bg.jpg'),
            'url'=>  $seolists['currenturl'],
            'canonical'=> $seolists['trpage'],
            'robots' => 'index, follow',
        ];



        return view('frontend.pages.about',compact('seo','about','services'));
    }


    // Show the contact page
    public function iletisim(){

        //seo
        $seolists = metaolustur('iletisim');

        $seo = [
            'title' =>  $seolists['title'] ?? '',
            'description' => $seolists['description'] ?? '',
            'keywords' => $seolists['keywords'] ?? '',
            'image' => asset('img/page-bg.jpg'),
            'url'=>  $seolists['currenturl'],
            'canonical'=> $seolists['trpage'],
            'robots' => 'index, follow',
        ];

        $label = \App\Models\ContactLabel::first();

        return view('frontend.pages.contact', compact('seo', 'label'));

    }

}
