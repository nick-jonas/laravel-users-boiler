<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/**
 * Social Authentication
 *
 * Authenticate via a social provider
 */

Route::get('user/{id}', function($id){
  $user = User::findOrFail($id);
  $isMe = false;
  if(Auth::check()){
    if(Auth::user()->id == $id){
      $isMe = true;
    }
  }
  return View::make('user.profile')->with(array('data' => $user, 'isMe' => $isMe));
});

Route::controller('account', 'AccountController');
Route::controller('password', 'RemindersController');
Route::controller('/', 'HomeController');
