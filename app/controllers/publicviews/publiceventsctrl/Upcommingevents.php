<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\eventmodels\Admincreateeventmodel;

/**
 * Events class
 */
class Upcommingevents extends Controller
{
    public function index()
    {
        $data['usertitle'] = "upcoming events";
        $eventpost = new Admincreateeventmodel();
        $data['eventpost'] = $eventpost->findAllevents() ;

        $this ->view('publicviews/publicevents/upcommingevents', $data);
    }
}
