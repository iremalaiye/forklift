<?php

use App\Http\Controllers\Frontend\PageHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use \App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ContactController;

require __DIR__.'/panel.php';
Route::group(['middleware' => 'sitesetting'], function () {

    Route::get('/', [PageHomeController::class,'anasayfa'] )->name('anasayfa');
    Route::get('/hakkimizda', [PageController::class,'hakkimizda'] )->name('hakkimizda');
    Route::get('/urunler', [PageController::class,'urunler'] )->name('urunler');
    Route::get('/urun/{slug}', [PageController::class,'urundetay'] )->name('urundetay');
    Route::get('/iletisim', [PageController::class,'iletisim'] )->name('iletisim');
    Route::post('/iletisim/gonder', [ContactController::class, 'store'])->name('iletisim.gonder');

    Auth::routes();
    Route::get('/login', [CustomAuthController::class,'login'] )->name('login');
    Route::get('/register', [CustomAuthController::class,'register'] )->name('register');
    Route::get('/cikis', [AjaxController::class,'logout'] )->name('cikis');


});






