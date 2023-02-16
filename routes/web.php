<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;

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

require __DIR__.'/auth.php';
