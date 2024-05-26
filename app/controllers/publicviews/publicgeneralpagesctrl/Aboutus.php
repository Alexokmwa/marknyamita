<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;

/**
 * aboutus class
 */
class Aboutus extends Controller
{
    public function index()
    {

        $this ->view('publicviews/publicgeneralpages/aboutus');
    }
}
