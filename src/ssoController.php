<?php

namespace miniorange\sso;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use miniorange\sso\index;


class ssoController extends Controller
{
	public function index(){
		$url = (__DIR__).'/index.php';
	header("Location:http://localhost/newTest/packages/miniorange/sso/src/index.php");
	exit();
}
    //
}
