<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\eventmodels\Admincreateeventmodel;

/**
 * Events class
 */
class Currentevents extends Controller
{
    public function index()
    {
        $data['usertitle'] = " current events";
        $eventpost = new Admincreateeventmodel();
        $data['eventpost'] = $eventpost->findAllevents() ;

        $this ->view('publicviews/publicevents/currentevents', $data);
    }
}
