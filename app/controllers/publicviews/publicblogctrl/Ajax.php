<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Postlikesmodal;
use app\models\Postlikesmodalnotloggedin;
use app\models\Request;
use app\models\Session;

/**
 * Ajax class
 */
class Ajax extends Controller
{
    public function index()
    {

        $ses = new Session();

        if ($ses->isLoggedIn()) {
            
        
        $userlikes = new Postlikesmodal();
        $req = new Request();
        $info = [];

        if ($req->posted()) {
            $post_data = $req->POST();
            $post_data["user_id"] = $ses->user("user_id");

            if($post_data['data_type'] == 'like') {
                $info['data_type'] = $post_data['data_type'];

                $post_data['user_id'] = $ses->user('user_id');
                if($row = $userlikes->first(['user_id' => $post_data['user_id'],'postID' => $post_data['postID']])) {
                    $disabled = 1;
                    $info['liked'] = false;
                    if($row->disabled == 1) {
                        $disabled = 0;
                        $info['liked'] = true;
                    }

                    $userlikes->updatebloglikes($row->likeID, ['disabled' => $disabled]);
                 // notification
                 $item_row = $userlikes->getRow('SELECT adminID from blogposts where postID  = :id limit 1',['id'=>$post_data["postID"]]);
                 if($item_row && $disabled == 0){

                     $arr['ownerid']=$item_row->adminID;
                     $arr['userID']=$post_data['user_id'];
                     $arr['Itemid']=$post_data['postID'];
                     $arr['type']='like';
                     if($arr['ownerid'] != $arr['userID']){

                         addnotifications($arr);
                     }
                 }
                } else {
                    $post_data['disabled'] = 0;
                    $userlikes->insert($post_data);

                    $info['liked'] = true;

                     // notification
                     $item_row = $userlikes->getRow('SELECT adminID from blogposts where postID  = :id 1',['id'=>$post_data["postID"]]);
                    //  show($item_row);
                     if($item_row){
 
                         $arr['ownerid']=$item_row->adminID;
                         $arr['userID']=$post_data['user_id'];
                         $arr['Itemid']=$post_data['postID'];
                         $arr['type']='like';
                         if($arr['ownerid'] != $arr['userID']){
 
                             addnotifications($arr);
                         }
                         show($arr);
                     }
                }
                $info['likes'] = $userlikes->getLikes($post_data['postID']);

            }

        }
        echo json_encode($info);


    }else{
            
        
        $userlikesnotlogged = new Postlikesmodalnotloggedin();
        $req = new Request();
        $info = [];


        if ($req->posted()) {
            $post_data = $req->POST();
            $user_id =$ses->getSessionID();
            $post_data["user_id"] = $user_id;
            // show($post_data);

            if($post_data['data_type'] == 'like') {
                $info['data_type'] = $post_data['data_type'];

                $post_data['user_id'] = $user_id;
                if($row = $userlikesnotlogged->first(['user_id' => $post_data['user_id'],'postID' => $post_data['postID']])) {
                    $disabled = 1;
                    $info['liked'] = false;
                    if($row->disabled == 1) {
                        $disabled = 0;
                        $info['liked'] = true;
                    }

                    $userlikesnotlogged->updatebloglikes($row->likeID, ['disabled' => $disabled]);
                 // notification
                //  $item_row = $userlikesnotlogged->getRow('select user_id from users where id = :id limit 1',['id'=>$post_data["postID"]]);
                //  if($item_row && $disabled == 0){

                //      $arr['ownerid']=$item_row->user_id;
                //      $arr['userID']=$post_data['user_id'];
                //      $arr['Itemid']=$post_data['postID'];
                //      $arr['type']='like';
                //      if($arr['ownerid'] != $arr['userID']){

                //          addnotifications($arr);
                //      }
                //  }
                } else {
                    $post_data['disabled'] = 0;
                    $userlikesnotlogged->insert($post_data);

                    $info['liked'] = true;
                    // notification
                    // $item_row = $userlikesnotlogged->getRow('select user_id from users where id = :id limit 1',['id'=>$post_data["postID"]]);
                    // if($item_row){

                    //     $arr['ownerid']=$item_row->user_id;
                    //     $arr['userID']=$post_data['user_id'];
                    //     $arr['Itemid']=$post_data['postID'];
                    //     $arr['type']='like';
                    //     if($arr['ownerid'] != $arr['userID']){

                    //         addnotifications($arr);
                    //     }
                    // }
                }
                $info['likes'] = $userlikesnotlogged->getLikesnotloggedin($post_data['postID']);

            }

        }
        echo json_encode($info);


    }
    }
}
