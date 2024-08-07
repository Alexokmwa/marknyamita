<?php

namespace app\controllers;
use app\models\Blogcommentsnotloggedin;
use app\models\Blogcomments;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Adminpostsmodel;
use app\models\Admincategories;
use app\models\Adminaccounts;
use app\models\Image;
use app\models\Pager;
use app\models\Postlikesmodal;
use app\models\Postlikesmodalnotloggedin;
use app\models\Request;

/**
 * Blog class
 */
class Blog extends Controller
{
    public function index()
    {



        // retrive categories data
        $user = new Admincategories();
        $data['row'] = $user->findAllcategories();

        $userpost = new Adminpostsmodel();

        // pager
        $limit = 10;
        $pager = new pager($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;
        $req = new Request();
        $req = new Request();
        $data['rowpost'] =[];
        $req = new Request();
        if ($req->posted()) {
            $selectedCategory = $req->POST();
            $categoryValue = isset($selectedCategory['category']) ? $selectedCategory['category'] : '';
        
            // Fetch filtered posts
            $data['rowpost'] = $userpost->wherecategory(['category' => $categoryValue]);
        } else {
            // Fetch default posts if no filter applied
            $data['rowpost'] = $userpost->findAllposts();
        }
        

        // get posts

        // get admin
        $adminpostdetail = new Adminaccounts();
        $data["image"] = new Image();
        $data["comments"] = new Blogcomments();
        $data["commentsnotlogged"] = new Blogcommentsnotloggedin();
        $data["likes"] = new Postlikesmodal();
        $data["likesnotlogged"] = new Postlikesmodalnotloggedin();

        $data["pager"] = $pager;

        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        // show($data);
        $this ->view('publicviews/publicgeneralpages/blog', $data);
    }
}
