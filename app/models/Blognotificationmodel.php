<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;


class Blognotificationmodel
{
    use Model;

    protected $table = 'publicblognotifications';
    protected $primaryKey = 'id';
    protected $loginUniqueColumn = 'id';

    protected $allowedColumns = [
        'userID',
        'Itemid',
        'ownerid',
        'type',
        'seen',
        'status',
    ];


  
}
