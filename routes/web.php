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

// STATIC PAGES ROUTES
Route::get('/', 'FrontendController@index')->name('home');

// MEMBERSHIP APPLICATION ROUTES
Route::get('join-sanctuary', 'ApplicantController@index')->name('join-sanctuary');
Route::post('membership-store', 'ApplicantController@store')->name('membership.store');

// USER CONTROLLER ROUTES
Route::post('profile-update', 'UserController@update_profile')->name('profile.update')->middleware('auth');

// ADMIN DASHBOARD ROUTES
Route::get('home', 'DashboardController@user_profile')->name('home')->middleware('auth');
Auth::routes();