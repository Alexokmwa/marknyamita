<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;

/**
 * Events class
 */
class Currentevents extends Controller
{
    public function index()
    {
        $data['usertitle'] = "Events";


        $this ->view('publicviews/publicevents/currentevents', $data);
    }
}
