<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;
use app\models\Pager;
use app\models\Session;
use app\models\Request;
use app\models\Blogcomments;
use app\models\Blogcommentsnotloggedin;

class Blogview extends Controller
{
    public function index($id = null)
    {
        $data['title'] = "View blog";
        $ses = new Session();
        $req = new Request();

        $userpost = new Adminpostsmodel();
        $data['rowpost'] = $userpost->first(['postID' => $id]);

        // Pager setup
        $limit = 10;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;

        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();

        // Instantiate Blogcomments model
        $blogCommentsModel = new Blogcomments();
        $usercomentnotloggedin = new Blogcommentsnotloggedin();

        if ($req->posted()) {
            $files = $req->files();
            $postid = $id;
            $postData = $req->POST();

            if ($ses->isLoggedIn()) {
                $userID = $ses->user("user_id");
                $blogCommentsModel->addblogcomment($postData, $files, $userID, $postid);
            } else {
                $userID = $ses->getSessionID();
                $usercomentnotloggedin->addblogcommentnotloggedin($postData, $files, $userID, $postid);
            }
            // Optionally redirect to the same page to prevent form resubmission on refresh
            // redirect('Blogview/'.$id);
        }

        $data["pager"] = $pager;
        $data["user"] = $blogCommentsModel;
        $data["usernotloggedin"] = $usercomentnotloggedin;

        $this->view('publicviews/publicblog/blogviewpage', $data);
    }
}
