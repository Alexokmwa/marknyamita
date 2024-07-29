<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;
use app\models\Pageradmin;
use app\models\Admincategories;

/**
 * admin Adminpostlistseach management class
 */
class Adminpostlistsearch extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        // retrive categories data
        $user = new Admincategories();
        $data['rowcategories'] = $user->findAllcategories();
        $userpost = new Adminpostsmodel();
        $userpost = new Adminpostsmodel();
        // pager
        $limit = 10;
        $pager = new Pageradmin($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;
        $data['limitnumber'] = $limit;
        $data['rowpost'] = []; 
        // search handling
        $find =$_GET["findblog"] ?? '';
        if(!empty($find)){

            $find ="%$find%";
            $query ="select * from blogposts where postname like :findblog limit $limit offset $offset" ;
            $data['rowpost'] = $userpost->query($query,['findblog'=>$find]);
        }
        // end search
        $data['blogpostCount'] = $userpost->countAllposts();
        $adminpostdetail = new Adminaccounts();
        $data['row'] = $adminpostdetail->findAlladmin();
        $data["pager"] = $pager;

        $data['admintitle'] = "Admin Postlist";
        $this ->adminview('adminviews/admingeneralpages/adminpost/adminsearchviews/adminpostlistsearch', $data);
    }
}
