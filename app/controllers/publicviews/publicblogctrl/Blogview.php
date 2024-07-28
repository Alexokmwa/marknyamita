<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;


/**
 * Blogview class
 */
class Blogview extends Controller
{
    public function index($id = null)
    {
        $data['title'] ="View blog";

        $userpost = new Adminpostsmodel();
        
        $data['rowpost'] =  $userpost->first(['postID' => $id]);
        if (!is_object($data['rowpost'])) {
            // Handle case where post is not found, e.g., redirect or show an error message
            redirectadmin('Blog'); // Example: redirect to posts list
        }
        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        $this ->view('publicviews/publicblog/blogviewpage', $data);
    }
}
