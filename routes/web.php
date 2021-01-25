<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'chatController@chat');
Route::get('chat', 'chatController@chat');
Route::post('send', 'chatController@send');
Route::post('saveToSession','ChatController@saveToSession');
Route::post('getOldMessages', 'chatController@getOldMessages');
Route::post('deleteSession', 'chatController@deleteSession');
Route::post('allusers', 'chatController@allusers');
Route::get('check' , function(){
    return session('chat');
});


Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});

Auth::routes();

Route::get('/home', 'chatController@chat')->name('home');
