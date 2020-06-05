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

Route::get('/superadmin', 'SuperAdmin\SuperAdminController@index')->name('superadmin.index');
Route::get('/superadmin/companies', 'SuperAdmin\CompanyController@index')->name('superadmin.companies');
Route::get('/superadmin/admins', 'SuperAdmin\AdminController@index')->name('superadmin.admins');
Route::get('/superadmin/skills', 'SuperAdmin\SkillController@index')->name('superadmin.skills');
Route::get('/admin/{id}', 'SuperAdmin\SuperAdminController@show')->name('superadmin.admin');

Route::post('/superadmin/companies', 'CompanyController@store')->name('company.store');
Route::get('/superadmin/companies/{id}/edit', 'SuperAdmin\CompanyController@edit')->name('superadmin.company.edit');
Route::put('/superadmin/companies/{id}/update', 'SuperAdmin\CompanyController@update')->name('superadmin.company.update');
Route::delete('/superadmin/companies/{id}/delete', 'SuperAdmin\CompanyController@destroy')->name('superadmin.company.delete');

Route::post('/superadmin/skills', 'SuperAdmin\SkillController@store')->name('skill.store');
Route::put('/superadmin/skills/{id}/update', 'SuperAdmin\SkillController@update')->name('superadmin.skill.update');
Route::delete('/superadmin/skills/{id}/delete', 'SuperAdmin\SkillController@destroy')->name('superadmin.skill.delete');

Route::post('/superadmin/admins', 'SuperAdmin\AdminController@store')->name('admin.store');
Route::get('/superadmin/admins/{id}/update', 'SuperAdmin\AdminController@edit')->name('admin.edit');
Route::put('/superadmin/admins/{id}/update', 'SuperAdmin\AdminController@update')->name('admin.update');
Route::delete('/superadmin/users/{id}/delete', 'SuperAdmin\AdminController@destroy')->name('admin.delete');


Route::get('/company/{id}', 'CompanyController@show')->name('company.show');
