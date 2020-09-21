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


   Route::group(['namespace' => 'dashboard','middleware'=>'guest:admin','prefix'=>'dashboard'], function () {
            Route::get('login', 'AdminController@adminlogin')->name('admin.login');
            Route::post('save', 'AdminController@saveadminlogin')->name('admin.post.login');
            Route::get('AdminRegister', 'AdminController@adminregister');
            Route::post('SaveAdminRegister', 'AdminController@saveadminregister');
          
        }
        );
           Route::group(['namespace' => 'dashboard','middleware'=>'auth:admin','prefix'=>'dashboard'], function () {
           Route::get('/', 'AdminController@dashboardpage')->name('admin.dashboard');
        
           //Journalist Routes

                Route::resource('Journalist', 'JournalistController');
                Route::get('Journalist/delete/{id}', 'JournalistController@destroy');
                //Magazin Route
              Route::resource('Magazine', 'MagazineController');
             
               Route::get('Magazine/delete/{id}', 'MagazineController@destroy');
            
              //Adds Route
             Route::resource('Adds', 'AddsController');
             Route::get('Adds/delete/{id}', 'AddsController@destroy');
             Route::get('Logout', 'AdminController@logout');
           //settings
            Route::get('settings', 'SettingController@edit');
            Route::post('settings/store', 'SettingController@store');
             Route::post('settings/update', 'SettingController@update');
             //users
             Route::get('users', 'UserController@index')->name('users.index');
             Route::post('users/store', 'UserController@store')->name('user.store');
             Route::get('users/{id}/edit', 'UserController@edit')->name('user.edit');
             Route::PUT('users/{id}', 'UserController@update')->name('users.update');
             Route::get('user/delete/{id}', 'UserController@destroy');
               //usersubscibes
             Route::get('users/subscribe', 'UsersuscribeController@index')->name('users.subscribe');
             Route::get('users/subscribe/{id}/edit', 'UsersuscribeController@edit')->name('usersubscribe.edit');
             Route::post('users/subscribe/{id}', 'UsersuscribeController@update')->name('usersubscribe.update');
              Route::get('users/subscribe/delete/{id}', 'UsersuscribeController@destroy');
          });
       
      
          Route::get('dashboard/redirect_login', 'HomeController@redirect_login')->name('redirect_login'); 
//Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');


// Admin Routes











