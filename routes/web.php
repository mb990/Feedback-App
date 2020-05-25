<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index')->name('home');
Route::get('/dashboard', 'PageController@dashboard')->name('user.dashboard')->middleware('auth');
Route::get('/feedback', 'PageController@feedback')->name('user.feedback');
Route::get('/test-get', 'PageController@testGet')->name('user.testGet');
Route::get('/feedback/user/{id}', 'FeedbackController@getUser')->name('feedback.user');
Route::post('/feedback/store', 'FeedbackController@storeData')->name('feedback.store');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
