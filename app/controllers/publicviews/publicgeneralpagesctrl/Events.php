<?php

namespace app\controllers;
use app\models\eventmodels\Admincreateeventmodel;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;

/**
 * Events class
 */
class Events extends Controller
{
    public function index()
    {
        $data['usertitle'] = "Events";
        $eventpost = new Admincreateeventmodel();
        $data['eventpost'] =$eventpost->findAllevents() ;
// show($data);

        $this ->view('publicviews/publicgeneralpages/events', $data);
    }
}
