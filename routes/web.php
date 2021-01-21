<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

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


Route::get('/', 'HomeController@index')->name('home');





// ADMIN
// Route::prefix('dashboard')
//     ->namespace('Admin')
    // ->middleware(['auth', 'admin','user'])
    Route::group(['namespace'=>'Admin','prefix'=>'dashboard','middleware'=>['auth']],function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        // Route Profile Admin
        Route::get('/profile/{id}', 'ProfileController@profile')->name('profile.index');
        Route::get('/edit/user/', 'ProfileController@edit')->name('profile.edit');
        Route::post('/edit/user/{id}', 'ProfileController@update')->name('profile.update');

        // Route Avatar
        Route::get('/edit/user/{id}', 'AvatarController@avatar')->name('profile.avatar');
        Route::post('/edit/user/', 'AvatarController@update_avatar')->name('profile.update_avatar');


        // Route Member
        Route::get('/member', 'MemberController@index')->name('member.index');
        Route::post('/member/search', 'MemberController@search')->name('member.search');
        Route::get('/member/create', 'MemberController@create')->name('member.create');
        Route::get('/member/{id}', 'MemberController@show')->name('member.show');
        Route::POST('/member', 'MemberController@store')->name('member.store');
        Route::get('/member/edit/{id}', 'MemberController@edit')->name('member.edit');
        Route::patch('/member/update/{id}', 'MemberController@update')->name('member.update');
        Route::delete('member/delete{id}', 'MemberController@destroy')->name('member.destroy');


        // Route Performance
        Route::get('/create', 'PerformanceController@create')->name('performance.create');
        Route::get('/performa/{id}', 'PerformanceController@show')->name('performance.show');
        Route::POST('/performance', 'PerformanceController@store')->name('performance.store');
        Route::get('/performa/edit/{id}', 'PerformanceController@edit')->name('performance.edit');
        Route::patch('/performa/update/{id}', 'PerformanceController@update')->name('performance.update');
        Route::delete('performa/delete{id}', 'PerformanceController@destroy')->name('performance.destroy');
    });


Auth::routes(['verify' => true]);
