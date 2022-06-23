<?php

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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
Route::get('welcome', function () {
    return view('welcome');
});
Route::get('/', 'EnquiryController@index');
Route::post('store-form','EnquiryController@store');
Route::get('data', 'EnquiryController@show');
Route::post('edit','EnquiryController@edit');



Route::get('thankyou', function () {
    return view('thankyou');
});
Route::get('form', function () {
    return view('form');
});

