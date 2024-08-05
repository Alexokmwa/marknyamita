<?php

namespace app\controllers;

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

        // get posts
        $data['rowpost'] = $userpost->findAllposts();

        // get admin
        $adminpostdetail = new Adminaccounts();
        $data["image"] = new Image();
        $data["likes"] = new Postlikesmodal();
        $data["likesnotlogged"] = new Postlikesmodalnotloggedin();

        $data["pager"] = $pager;

        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        // show($data);
        $this ->view('publicviews/publicgeneralpages/blog', $data);
    }
}
