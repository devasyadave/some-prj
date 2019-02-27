<?php

namespace miniorange\sso;

//use MiniOrange\Classes\Actions\SendAuthnRequest;
use MiniOrange\Helper\Utilities;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use SendAuthnRequest;

//include_once 'autoload.php';

class Login extends Controller
{
    public function index()
    {   

        try {
            SendAuthnRequest::execute();
        } catch (\Exception $e) {
            Utilities::showErrorMessage($e->getMessage());
        }
    }
}
