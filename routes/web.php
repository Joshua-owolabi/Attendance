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
Route::get('/', 'FrontendController@index')->name('/');

// MEMBERSHIP APPLICATION ROUTES
Route::get('join-sanctuary', 'ApplicantController@index')->name('join-sanctuary');
Route::post('membership-store', 'ApplicantController@store')->name('membership.store');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {

  Route::get('members', 'UserController@index')->name('members-all');
  Route::post('member-update', 'UserController@admin_update_member')->name('member.update');
  Route::post('member-delete', 'UserController@delete_member')->name('member.delete');
  Route::get('search-members', 'UserController@search_members')->name('search-members');
  Route::get('view-member/{id}', 'UserController@view_member')->name('view-member');

  // ADMIN DASHBOARD ROUTES
  Route::get('attendance-panel', 'AttendanceController@index')->name('attendance');
  Route::post('pick-date', 'AttendanceController@pick_date')->name('pick-date');
  Route::post('take-attendance', 'AttendanceController@take_member_attendance')->name('take-attendance');
  //PRINTING ROUTES
  Route::get('print-panel', 'DashboardController@print_panel')->name('print-panel');
  Route::get('members-print', 'DashboardController@all_members_print')->name('members-print');
  Route::post('subunit-print', 'DashboardController@subunit_print')->name('subunit-print');
});

// USER CONTROLLER ROUTES
Route::post('profile-update', 'UserController@update_profile')->name('profile.update')->middleware('auth');
Route::get('dashboard', 'DashboardController@user_profile')->name('dashboard')->middleware('auth');


Auth::routes();
