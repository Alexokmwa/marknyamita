<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Adminpostsmodel;
use app\models\Admincategories;
use app\models\Adminaccounts;

/**
 * Bloggrid class
 */
class Bloggrid extends Controller
{
    public function index()
    {
        $user = new Admincategories();
		$data['row'] = $user->findAllcategories();
        $userpost = new Adminpostsmodel();
		$data['rowpost'] = $userpost->findAllposts();
        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        
        $this ->view('publicviews/publicblog/bloggrid',$data);
    }
}
