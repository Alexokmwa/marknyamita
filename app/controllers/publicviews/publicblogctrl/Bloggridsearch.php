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
 * Bloggridsearch class
 */
class Bloggridsearch extends Controller
{
    public function index()
    {
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
        // $data['rowpost'] = $userpost->findAllposts();
        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        $data["image"] = new Image();
        $data["pager"] = $pager;


        $this ->view('publicviews/publicblog/bloggridsearch', $data);
    }
}
