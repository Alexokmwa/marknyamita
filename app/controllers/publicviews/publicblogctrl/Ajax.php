<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Postlikesmodal;
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

        if (!$ses->isLoggedIn()) {
            echo"please log in";
            die;
        }
        $userlikes = new Postlikesmodal();
        $req = new Request();
        $info = [];

        if ($req->posted()) {
            $post_data = $req->POST();
            $post_data["user_id"] = $ses->user("user_id");

            // $info['data_type'] = $post_data['data_type'];
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
                } else {
                    $post_data['disabled'] = 0;
                    $userlikes->insert($post_data);

                    $info['liked'] = true;
                }
                $info['likes'] = $userlikes->getLikes($post_data['postID']);

            }

        }
        echo json_encode($info);


    }
}
