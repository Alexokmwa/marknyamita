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
use app\models\Request;
use app\models\Blogcommentsnotloggedin;
use app\models\Blogcomments;
/**
 * Bloggrid class
 */
class Bloggrid extends Controller
{
    public function index()
    {
        $user = new Admincategories();
        $data['row'] = $user->findAllcategories();
        $data["comments"] = new Blogcomments();
        $data["commentsnotlogged"] = new Blogcommentsnotloggedin();
        $userpost = new Adminpostsmodel();
        // pager
        $limit = 10;
        $pager = new pager($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;
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
        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        $data["likes"] = new Postlikesmodal();
        $data["likesnotlogged"] = new Postlikesmodalnotloggedin();
        $data["image"] = new Image();
        $data["pager"] = $pager;


        $this ->view('publicviews/publicblog/bloggrid', $data);
    }
}
