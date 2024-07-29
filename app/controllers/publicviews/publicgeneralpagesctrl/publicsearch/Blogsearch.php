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

/**
 * Blogsearch class
 */
class Blogsearch extends Controller
{
    public function index()
    {



        // retrive categories data
        $user = new Admincategories();
        $data['row'] = $user->findAllcategories();

        $userpost = new Adminpostsmodel();

        // pager
        $limit = 24;
        $pager = new pager($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;
        $data['rowpost'] = []; 
        $find =$_GET["findblogpublic"] ?? '';
        if(!empty($find)){

            $find ="%$find%";
            $query ="select * from blogposts where 
            postname like :findblogpublic
            posttype like :findblogpublic
            tags like :findblogpublic
            category like :findblogpublic
            status like :findblogpublic
            OR shortdescription LIKE :findblogpublic 
            OR postbody LIKE :findblogpublic  
            limit $limit offset $offset" ;
            $data['rowpost'] = $userpost->query($query,['findblogpublic'=>$find]);

        }
        // get posts
        // $data['rowpost'] = $userpost->findAllposts();

        // get admin
        $adminpostdetail = new Adminaccounts();
        $data["image"] = new Image();
        $data["pager"] = $pager;

        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        // show($data);
        $this ->view('publicviews/publicgeneralpages/publicsearchviewpages/blogsearch', $data);
    }
}
