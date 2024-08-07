<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Request;

use app\models\Notificationmodel;
/**
 * admin not found management class
 */
class Adminnotificationconroller extends Admincontroller
{
    public function adminindex()
    {
        $data['admintitle'] = "Admin notification";
        $notif = new Notificationmodel();
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $userID = $ses ->adminuser('adminID');
    
        $data['rows']=$notif->where(['ownerid'=>$userID]);
        if($data['rows']){
            foreach ($data['rows'] as $key =>$row){
                $check_user = $notif->getRow("SELECT * FROM users WHERE user_id = :id limit 1",['id'=>$row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE postID = :id limit 1",['id'=>$row->Itemid]);
                $data['rows'][$key]->user_row =  $check_user;
                $data['rows'][$key]->item_row=$check_postphoto ;
            }

        }
        // delete notification
        $req = new Request();
        if ($req->posted()) {
            $postData = $req->POST();
            $notif_id= $req->POST("id");

            $formType = $postData['form_type']; // Get the form type

            $notif = new Notificationmodel();
            switch ($formType) {
                case 'delete_notification':
                    # code...
                    $notif->delete($notif_id);
                    break;
            }
            $ses = new Adminsession();

            $ses->set('comment_success', 'notification deleted successfully');
       redirectadmin("Adminnotificationconroller");

        }
        
        $this->adminView('adminviews/adminnotification',$data);

        // echo  "404 error page not found";
    }
}
