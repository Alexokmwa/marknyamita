<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;


class Notificationmodel
{
    use Model;

    protected $table = 'notifications';
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
