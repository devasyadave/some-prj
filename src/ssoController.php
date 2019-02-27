<?php

namespace miniorange\sso;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use miniorange\sso\index;



class ssoController extends Controller
{
	public function index(){
		$url = '/miniorange/sso/index.php';
		echo $url;
	header("Location: $url");
	exit();
}
	function register(){
	    header("Location: login.php");
	    exit();
	}
    //
}
