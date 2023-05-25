<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ApartmentUserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReviewController;
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
    Route::get('/search/results','search')->name('search');
});


Route::controller(AuthController::class)->group(function (){
    Route::middleware("guest")->group(function (){
        Route::get('/page/register','registerPage')->name('register-page');
        Route::post('/register','register')->name('register');
        Route::get('/page/login','loginPage')->name('login');
        Route::post('/login','login')->name('login.process');
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


Route::controller(FavoriteController::class)->middleware('auth')->prefix('favorites')
    ->group(function (){
    Route::get('/add/{id}','add')->name('favorite.add');
    Route::get('/remove/{id}','remove')->name('favorite.remove');
    Route::get('/','showAll')->name('favorites');
});

Route::controller(ProfileController::class)->middleware('auth')->prefix('profile')
    ->group(function () {
    Route::get('/','show')->name('profile.show');
    Route::post('/update','update')->name('profile.update');
});

Route::controller(BookingController::class)->middleware('auth')->group(function () {
    Route::get('/book/{id}','showBookingPage')->name('booking.page');
    Route::post('/book/process','book')->name('booking.process');
    Route::get('/account/bookings','bookingHistory')->name('booking.history');
    Route::post('/bookings/update/{id}','update')->name('booking.update.status');
});

Route::resource('my-apartments',ApartmentUserController::class)->middleware('auth');
Route::get('/show/bookings/{id}',[ApartmentUserController::class,'showBookings'])->name('bookings.show');

Route::controller(RoomController::class)->middleware('auth')->group(function () {
    Route::get('/add/room/{id}','create')->name('room.create');
    Route::post('/add/room','store')->name('room.store');
});

Route::controller(ReviewController::class)->middleware('auth')->prefix('review')
    ->group(function () {
    Route::get('/create/{id}','create')->name('review.create');
    Route::post('/add','store')->name('review.store');
});
