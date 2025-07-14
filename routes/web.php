<?php

use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;



Route::group(['middleware' => 'sitesetting'], function () {
    Route::get('/', [PageHomeController::class,'anasayfa'] )->name('anasayfa');


    Route::get('/hakkimizda', [PageController::class,'hakkimizda'] )->name('hakkimizda');
    Route::get('/iletisim', [PageController::class,'iletisim'] )->name('iletisim');
    Route::get('/urunler', [PageController::class,'urunler'] )->name('urunler');
    Route::get('/urun/detay', [PageController::class,'urundetay'] )->name('urundetay');
    Route::get('/sepet', [PageController::class,'cart'] )->name('sepet');

});
