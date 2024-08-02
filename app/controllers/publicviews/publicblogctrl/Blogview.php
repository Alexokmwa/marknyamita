<?php

namespace app\controllers;

// deny access to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;
use app\models\Pager;
use app\models\Session;
use app\models\Request;
use app\models\Blogcomments;

/**
 * Blogview class
 */
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

        if ($req->posted()) {
            $files = $req->files();
            $sesid = $ses->user("user_id");
            $userID = $sesid;
            $postid = $id;
            $postData = $req->POST();

            // Call addblogcomment method on the Blogcomments model instance
            $blogCommentsModel->addblogcomment($postData, $files, $userID, $postid);

            // Optionally redirect to the same page to prevent form resubmission on refresh
            // redirect('Blogview/'.$id);
        }

        if (!is_object($data['rowpost'])) {
            // Handle case where post is not found, e.g., redirect or show an error message
            redirect('Blog'); // Example: redirect to posts list
        }


        $data["pager"] = $pager;
        $data["user"] = $blogCommentsModel;

        $this->view('publicviews/publicblog/blogviewpage', $data);
    }
}
