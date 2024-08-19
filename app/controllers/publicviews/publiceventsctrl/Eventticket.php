<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\eventmodels\Adminregistereventattendeesmodel;

/**
 * Events class
 */
class Eventticket extends Controller
{
    public function index()
    {
        $data['usertitle'] = "event ticket";
        $eventpost = new Adminregistereventattendeesmodel();
        $data['eventregister'] = $eventpost->findAlleventregister() ;

        $this ->view('publicviews/publicevents/eventticket', $data);
    }
}
