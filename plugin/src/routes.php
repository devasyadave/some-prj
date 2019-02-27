<?php

Route::get('setup',['middleware' => 'index']);
Route::get('registerForm',function(){
    return view('plugin::register');
});
Route::post('register','miniorange\sso\register@index');
Route::get('account','miniorange\sso\account@index');
Route::get('login','miniorange\sso\login@index');
