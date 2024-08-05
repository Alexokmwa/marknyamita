<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Controller;
use app\models\Adminsession;
use app\models\Notificationmodel;

class Notifications extends Controller
{
    public function index()
    {
        $notif = new Notificationmodel();
        $ses = new Adminsession();
        // if(!$ses->isLoggedIn()) {
        //     redirectadmin('Adminsignin');
        // }
        $userID = $ses ->adminuser('adminID');

        $data['rowspublic'] = $notif->where(['ownerid' => 0]);
        if($data['rowspublic']) {
            foreach ($data['rowspublic'] as $key => $row) {
                $check_user = $notif->getRow("SELECT * FROM admins WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE postID = :id limit 1", ['id' => $row->Itemid]);
                $data['rowspublic'][$key]->user_row =  $check_user;
                $data['rowspublic'][$key]->item_rowblog = $check_postphoto ;
            }

        }
        // show();
        $this->view('publicviews/notifications', $data);

    }
}
