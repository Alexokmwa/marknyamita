<?php

namespace app\models\eventmodels;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use app\models\Session;
use Exception;

class Adminregistereventattendeesmodel
{
    use Model;

    protected $table = 'event_registrations';
    protected $primaryKey = 'registration_id';
    protected $loginUniqueColumn = 'registration_id';

    protected $allowedColumns = [
        'first_name',
        'last_name'	,
        'email'	,
        'phone_number'	,
        'county',
        'agree_terms',
    ];

    protected $validationRules = [
        'first_name' => [
           'alpha',
            'required',
        ],
        'last_name' => [
            'alpha',
            'required',
        ],
        'email' => [
            'email',

        ],
        'phone_number' => [
            'numericphone',
            'required',
        ],
        'county' => [
            'alpha',
            'required',
        ],
        'agree_terms' => [
            'required',
        ],
    ];

    public function registereventparticipants($data)
    {
        if ($this->validate($data)) {
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");




            if (empty($this->errors)) {
                $this->insert($data);
                // notification
                // $item_row = $this->getRow('SELECT adminID FROM blogposts WHERE postID = :id', ['id' => $postid]);
                // if ($item_row) {
                //     $arr['ownerid'] = $item_row->adminID;
                //     $arr['userID'] = $userID;
                //     $arr['Itemid'] = $postid;
                //     $arr['type'] = 'comment';
                //     if ($arr['ownerid'] != $arr['userID']) {
                //         commentaddnotifications($arr);
                //     }
                // }

                $ses = new Session();
                $ses->set('comment_success', 'You event registration is succcessfull.');

                redirect('Eventticket');
            }
        }
    }

}
