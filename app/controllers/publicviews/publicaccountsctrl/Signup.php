<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\User;
use app\models\Request;

/**
 * signup class
 */
class Signup extends Controller
{
    public function index()
    {
        $data['usertitle'] = "signup";
        $data['user'] = new User();
        $req = new Request();
        if($req->posted()) {
            $data['user']->signup($_POST);
        }
        $this ->view('publicviews/publicaccounts/signup', $data);
    }
}
