<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\User;
use app\models\Request;

/**
 * Login class
 */
class Login extends Controller
{
    public function index()
    {
        $data['user'] = new User();
        $req = new Request();
        if($req->posted()) {
            $data['user']->login($_POST);
        }
        $this ->view('publicviews/publicaccounts/login', $data);
    }
}
