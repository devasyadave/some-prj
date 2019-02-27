<?php
/*
Plugin Name: miniOrange PHP SAML 2.0 Connector
Version: 11.0.0
Author: miniOrange
*/
namespace miniorange\sso;
//require 'connector.php';
use Illuminate\Http\Request;
use Illuminate\Http\Middleware;
use miniorange\sso\Connector;
use Closure;

class Index {
    public function handle($request, Closure $next){
if(!(new Connector())->is_user_registered()){
    header("Location: registerForm");
    exit();
} else {
    header("Location: admin_login.php");
    exit();
}
}
}

 ?>