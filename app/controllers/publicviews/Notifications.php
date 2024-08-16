<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Controller;
use app\models\Adminsession;
use app\models\Blognotificationmodel;
use app\models\Eventnotificationmodel;
use app\models\Notificationmodel;
use app\models\Request;
use app\models\Session;

class Notifications extends Controller
{
    public function index()
    {
        $notifevent = new Eventnotificationmodel;
        $notif = new Blognotificationmodel;
        $ses = new Adminsession();
        
        $userID = $ses ->adminuser('adminID');

        $data['rowspublic'] = $notif->where(['ownerid' => 0]);
        $data['rowspublicevent'] = $notifevent->where(['ownerid' => 0]);
        if($data['rowspublicevent']) {
            foreach ($data['rowspublicevent'] as $key => $row) {
                $check_user = $notifevent->getRow("SELECT * FROM admins WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphotoevent = $notifevent->getRow("SELECT * FROM events WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphotoevent = $notifevent->getRow("SELECT * FROM events WHERE eventID = :id limit 1", ['id' => $row->Itemid]);
                $data['rowspublicevent'][$key]->user_row =  $check_user;
                $data['rowspublicevent'][$key]->item_rowevent = $check_postphotoevent ;
            }

        }
        if($data['rowspublic']) {
            foreach ($data['rowspublic'] as $key => $row) {
                $check_user = $notif->getRow("SELECT * FROM admins WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE postID = :id limit 1", ['id' => $row->Itemid]);
                
                $data['rowspublic'][$key]->user_row =  $check_user;
                $data['rowspublic'][$key]->item_rowblog = $check_postphoto ;
                
            }

        }
        // delete notification
        $req = new Request();
        if ($req->posted()) {
            $postData = $req->POST();
            $notif_id= $req->POST("id");

            $formType = $postData['form_type']; // Get the form type

            
            switch ($formType) {
                case 'delete_notification':
                    # code...
                    $notif->delete($notif_id);
                    $ses = new Session;
        
                    $ses->set('comment_success', 'post notification deleted successfully');
               redirect("Notifications");
                    break;
                case 'eventdelete_notification':
                    # code...
                    $notifevent->delete($notif_id);
                    $ses = new Session;
        
                    $ses->set('comment_success', 'event notification deleted successfully');
               redirect("Notifications");
                    break;
            }

        }
        // show();
        $this->view('publicviews/notifications', $data);

    }
}
