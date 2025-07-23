<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\ContactController;
Route::group(['middleware' => ['panelsetting','auth'],'prefix'=>'panel','as'=>'panel.'], function () {
    Route::get('/', [DashboardController::class,'index'] )->name('index');

    Route::get('/slider', [SliderController::class,'index'] )->name('slider.index');
    Route::get('/slider/ekle', [SliderController::class,'create'] )->name('slider.create');
    Route::get('/slider/{id}/edit', [SliderController::class,'edit'] )->name('slider.edit');
    Route::post('/slider/store', [SliderController::class,'store'] )->name('slider.store');
    Route::put('/slider/{id}/update', [SliderController::class,'update'] )->name('slider.update');
    Route::delete('/slider/{id}/destroy', [SliderController::class,'destroy'] )->name('slider.destroy');

    Route::post('/slider-durum/update', [SliderController::class,'status'] )->name('slider.status');
    Route::post('/product-durum /update', [ProductController::class,'status'] )->name('product.status');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::resource('products', ProductController::class);


    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');









});

