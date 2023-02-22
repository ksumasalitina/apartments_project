<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(ApartmentController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/find','find')->name('find');
    Route::get('/filter','filter')->name('filter');
    Route::get('/show/{id}','show')->name('show');
});


Route::controller(AuthController::class)->group(function (){
    Route::middleware("guest")->group(function (){
        Route::get('/page/register','registerPage')->name('register-page');
        Route::post('/register','register')->name('register');
        Route::get('/page/login','loginPage')->name('login-page');
        Route::post('/login','login')->name('login');
        Route::get('/page/reset','resetPasswordPage')->name('reset-password-page');
        Route::post('/reset','resetPassword')->name('reset-password');
    });

    Route::get('/email/verification-notification', 'sendVerificationEmail')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    Route::get('/logout','logout')->middleware('auth')->name('logout');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request){
    $request->fulfill();
    return redirect(route('home'));
})->middleware(['auth','signed'])->name('verification.verify');
