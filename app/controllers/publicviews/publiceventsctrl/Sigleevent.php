<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\eventmodels\Admincreateeventmodel;

/**
 * Events class
 */
class Sigleevent extends Controller
{
    public function index($id = null)
    {
        $data['usertitle'] = "single event";

        $eventpost = new Admincreateeventmodel();
        $data['eventpost'] = $eventpost->first(['eventID' => $id]);
        ;
        $this ->view('publicviews/publicevents/singleevent', $data);
    }
}
