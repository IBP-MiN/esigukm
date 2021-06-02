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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::get('/admin', function(){
    return 'You are admin';
})->middleware(['auth', 'auth.admin']);

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::get('impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');
    Route::get('/search', 'UserController@search')->name('search');
    Route::get('/meeting', 'UserController@indexMeeting')->name('meeting');
    Route::get('/meeting/create', 'UserController@createMeeting')->name('meeting.create');
    Route::post('/meeting/store', 'UserController@storeMeeting')->name('meeting.store');
    Route::get('/meeting/{id}', 'UserController@showMeeting')->name('meeting.show');
    Route::get('/meeting/edit/{id}', 'UserController@editMeeting')->name('meeting.edit');
    Route::post('/meeting/update/', 'UserController@updateMeeting')->name('meeting.update');
    Route::post('/meeting/destroy', 'UserController@destroyMeeting')->name('meeting.destroy');
    Route::post('/meeting/search', 'UserController@searchMeeting')->name('meeeting.search');
    
    
});

Route::get('/admin/impersonate/destory','Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');

// Profile for admin, ajk and user
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

//Meeting
Route::get('/meeting', 'Homecontroller@userMeeting')->name('meeting.index');
Route::get('/meeting/{id}', 'Homecontroller@showMeeting')->name('meeting.show');
// Confirmation for the meeting

