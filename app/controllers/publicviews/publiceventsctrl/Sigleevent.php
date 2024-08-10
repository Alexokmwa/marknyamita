<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;

/**
 * Events class
 */
class Sigleevent extends Controller
{
    public function index()
    {
        $data['usertitle'] = "Events";


        $this ->view('publicviews/publicevents/singleevent', $data);
    }
}
