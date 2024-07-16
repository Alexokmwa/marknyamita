<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Admincategories;
use app\models\Request;

class Adminpostcategories extends Admincontroller
{
    public function adminindex()
    {

        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $user = new Admincategories();
		$data['row'] = $user->findAllcategories(); 
        $data['admintitle'] = "Admin Categories";
        $data['admin'] = new Admincategories();

        $req = new Request();
        if ($req->posted()) {
            $result = $data['admin']->adminaddcategory($req->POST());
            echo json_encode($result);
            exit;
        }

        $this->adminview('adminviews/admingeneralpages/adminpost/adminpostcategories', $data);
    }
}
