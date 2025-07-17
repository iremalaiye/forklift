<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;



Route::group(['middleware' => ['panelsetting','auth'],'prefix'=>'panel','as'=>'panel.'], function () {
    Route::get('/', [DashboardController::class,'index'] )->name('index');
});

