<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;


class Eventnotificationmodel
{
    use Model;

    protected $table = 'publiceventnotifications';
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
