<?php

use App\Http\Controllers\admin\AdminEventController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* ----------- ÖN YÜZ ROUTE ----------- */

Route::get('/', [HomePageController::class, 'index'])->name('homepage');

/* ÖNYÜZ LOGİN İŞLEMLERİ */
Route::get('/login', [HomePageController::class, 'login'])->name('login');
Route::post('/loginpost', [HomePageController::class, 'loginpost'])->name('loginpost');
Route::post('/logoutpost', [HomePageController::class, 'logoutpost'])->name('logoutpost');
/* ÖNYÜZ LOGİN İŞLEMLERİ */

/* ÖNYÜZ REGİSTER İŞLEMLERİ */
Route::get('/register', [HomePageController::class, 'register'])->name('register');
Route::post('/registerpost', [HomePageController::class, 'registerPost'])->name('registerpost');
/* ÖNYÜZ REGİSTER İŞLEMLERİ */

Route::get('/event/{id}', [EventDetailController::class, 'index'])->name('eventdetail');
Route::post('/eventpostresponse', [EventDetailController::class, 'eventPostResponse'])->name('eventpostresponsename');
Route::post('/eventupdateresponse', [EventDetailController::class, 'eventupdateresponse'])->name('eventupdateresponse');


Route::middleware(['middleware' => 'alluser'])->group(function () {

    /* PROFİL İŞLEMİ */
    Route::get('/profile', [ProfileController::class, 'userprofilefunc'])->name('userprofile');
    Route::post('/profileupdate', [ProfileController::class, 'profileupdatefunc'])->name('profileupdate');
    /* PROFİL İŞLEMİ */

    /* LOGOUT İŞLEMİ */
    Route::post('/logoutpost', [HomePageController::class, 'logoutpost'])->name('logoutpost');
    /* LOGOUT İŞLEMİ */

});

/* ----------- ÖN YÜZ ROUTE ----------- */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/* ----------- PANEL ROUTE ----------- */

Route::prefix('admin')->name('admin')->group(function () {

    /* LOGİN İŞLEMLERİ */

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/adminloginfunc', [LoginController::class, 'adminloginfunc'])->name('adminloginfunc');

    /* LOGİN İŞLEMLERİ */

    Route::middleware(['middleware' => 'adminuser'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('homepage');
        Route::get('/eventadd', [AdminEventController::class, 'eventAction'])->name('eventadd');
        Route::post('/adminlogoutpost', [LoginController::class, 'adminlogoutpost'])->name('adminlogoutpost');
        Route::post('/eventaddpost', [AdminEventController::class, 'eventadd'])->name('eventaddpost');

        Route::get('/eventupdate/{id}', [AdminEventController::class, 'eventupdate'])->name('eventupdate');
        Route::post('/eventupdatepost', [AdminEventController::class, 'eventupdatepost'])->name('eventupdatepost');
        Route::get('/eventdelete', [AdminEventController::class, 'eventdelete'])->name('eventdelete');
    });
});

/* ----------- PANEL ROUTE ----------- */