<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\Eventnotificationmodel;

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
        if(!empty($_GET['seen']) && !empty($_GET['notifevent'])) {
            $notif_id = (int)$_GET['notifevent'];
            $notif = new Eventnotificationmodel;
            $notif->update($notif_id, ['seen' => 1]);

        }
        $this ->view('publicviews/publicevents/singleevent', $data);
    }
}
