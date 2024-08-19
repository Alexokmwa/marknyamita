<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\eventmodels\Adminregistereventattendeesmodel;
use app\models\Eventnotificationmodel;
use app\models\Request;

/**
 * Events class
 */
class Sigleevent extends Controller
{
    public function index($id = null)
    {
        $data['usertitle'] = "single event";
        $req = new Request();

        $eventpost = new Admincreateeventmodel();
        $eventregister = new Adminregistereventattendeesmodel();
        $data['eventpost'] = $eventpost->first(['eventID' => $id]);
        if ($req->posted()) {
            $postData = $req->POST();
            $eventregister->registereventparticipants($postData);
        }
        if(!empty($_GET['seen']) && !empty($_GET['notifevent'])) {
            $notif_id = (int)$_GET['notifevent'];
            $notif = new Eventnotificationmodel();
            $notif->update($notif_id, ['seen' => 1]);

        }
        $data["user"] =  $eventregister;

        $this ->view('publicviews/publicevents/singleevent', $data);
    }
}
