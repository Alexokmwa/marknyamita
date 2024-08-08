<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;
use app\models\Pager;
use app\models\Session;
use app\models\Request;
use app\models\Blogcomments;
use app\models\Blogcommentsnotloggedin;

/**
 * Blogview class
 */
class Blogview extends Controller
{
    public function index($id = null)
    {
        $data['title'] = "View blog";
        $ses = new Session();
            $usercomentnotloggedin = new Blogcommentsnotloggedin();

        $usercoment = new Blogcomments();
        // $sesid = null;
        if($ses->isLoggedIn()) {
                $sesid = $ses->user("user_id");
            $req = new Request();
            if ($req->posted()) {
                $files = $req->files();
                $userID = $sesid;
                $postid = $id;
                $data = $req->POST();
                // show($data);
                // show( $files);
                // show($userID);
                // show( $postid);
                // $data["userID"] = $userID;
                // $data["postid"] = $postid;
                $usercoment->addblogcomment($data, $files, $userID,$postid);
                // redirect('Blogview/'.$id);

        }
        }else{
            $sesid =$ses->getSessionID();
        $req = new Request();
        if ($req->posted()) {
            $files = $req->files();
            $userID = $sesid;
            $postid = $id;
            $data = $req->POST();
            // show($data);
            // show( $files);
            // show($userID);
            // show( $postid);
            // $data["userID"] = $userID;
            // $data["postid"] = $postid;
            $usercomentnotloggedin->addblogcommentnotloggedin($data, $files, $userID,$postid);
            // redirect('Blogview/'.$id);

        }
        }
        $userpost = new Adminpostsmodel();
        $data['rowpost'] =  $userpost->first(['postID' => $id]);

        
        // pager
        $limit = 10;
        $pager = new pager($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;

        // if (!is_object($data['rowpost'])) {
        //     // Handle case where post is not found, e.g., redirect or show an error message
        //     redirectadmin('Blog'); // Example: redirect to posts list
        // }
        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        $data["pager"] = $pager;
        $data["user"] = $usercoment;
        $data["usernotloggedin"] = $usercomentnotloggedin;
        $this ->view('publicviews/publicblog/blogviewpage', $data);
    }
}
