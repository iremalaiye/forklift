<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
Route::group(['middleware' => ['panelsetting','auth','admin'],'prefix'=>'panel','as'=>'panel.'], function () {



    Route::get('/', [DashboardController::class,'index'] )->name('index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/slider', [SliderController::class,'index'] )->name('slider.index');
    Route::get('/slider/ekle', [SliderController::class,'create'] )->name('slider.create');
    Route::get('/slider/{id}/edit', [SliderController::class,'edit'] )->name('slider.edit');
    Route::post('/slider/store', [SliderController::class,'store'] )->name('slider.store');
    Route::put('/slider/{id}/update', [SliderController::class,'update'] )->name('slider.update');
    Route::delete('/slider/{id}/destroy', [SliderController::class,'destroy'] )->name('slider.destroy');


    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');

    Route::get('/panel/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::resource('services', ServiceController::class);


    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::resource('products', ProductController::class);

    Route::post('/slider-durum/update', [SliderController::class,'status'] )->name('slider.status');
    Route::post('/product-durum /update', [ProductController::class,'status'] )->name('product.status');
    Route::post('/service-durum /update', [ServiceController::class,'status'] )->name('services.status');

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');




    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


    Route::post('/admin-email', [AdminController::class, 'saveAdminEmail'])->name('email.save');
    Route::get('/admin-email', [AdminController::class, 'showAdminEmailForm'])->name('email.form');







});

