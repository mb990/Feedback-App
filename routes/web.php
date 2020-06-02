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
Route::get('/dashboard', 'PageController@dashboard')->name('user.dashboard');
Route::get('/profile/{id}', 'PageController@profile')->name('user.profile');
Route::get('/feedback', 'PageController@feedback')->name('user.feedback');
Route::get('/test-get', 'PageController@testGet')->name('user.testGet');
Route::get('/feedback/user/{id}', 'FeedbackController@getUser')->name('feedback.user');
Route::post('/feedback/store', 'FeedbackController@storeData')->name('feedback.store');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

// SUPERADMIN

Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin.index');
Route::get('/superadmin/companies', 'SuperAdminController@companies')->name('superadmin.companies');
Route::get('/superadmin/admins', 'SuperAdminController@admins')->name('superadmin.admins');
Route::get('/superadmin/skills', 'SuperAdminController@skills')->name('superadmin.skills');
Route::get('/admin/{id}', 'SuperAdminController@admin')->name('superadmin.admin');


Route::get('/company/{id}', 'CompanyController@index')->name('company.index');
