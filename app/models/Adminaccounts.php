<?php

namespace app\models;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;

use app\models\Adminsession;

/**
 * Admin class
 */
class Adminaccounts
{
    use Model;

    protected $table = 'admins';
    protected $tablekeys = 'adminkeys';
    protected $primaryKey = 'id';
    protected $loginUniqueColumn = 'email';

    protected $allowedColumns = [

        'firstname',
        'lastname',
        'username',
        'uniqueID',
        'email',
        'password',
    ];

    /*****************************
     * 	rules include:
        required
        alpha
        email
        numeric
        unique
        passwordmatch
        symbol
        longer_than_8_chars
        alpha_numeric_symbol
        alpha_numeric
        alpha_symbol
        adminidcheck
     *
     ****************************/
    protected $validationRules = [

        'email' => [
            'email',
            'unique',
            'required',
        ],
        'firstname' => [
            'alpha',
            'required',
        ],
        'lastname' => [
            'alpha',
            'required',
        ],
        'uniqueID' => [
            'adminidcheck',
           'unique',
           'numeric',
            'required',

        ],
        'username' => [
            'alpha',
           'unique',

            'required',
        ],
        'password' => [
            'not_less_than_8_chars',
            'required',
           
        ],
        'confirmpassword' => [
            'not_less_than_8_chars',
            'required',
            'passwordmatch',
        ],
        'terms' => [
           'required',
        ],
    ];

    public function adminsignup($data)
    {
        if($this->validate($data)) {
            //add extra user columns here
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");

            $this->insert($data);
            redirectadmin('Adminsignin');
        }
    }

    public function adminlogin($data)
    {
        $row = $this->first([$this->loginUniqueColumn => $data[$this->loginUniqueColumn]]);

        if($row) {

            //confirm password
            if(password_verify($data['password'], $row->password)) {
                $ses = new Adminsession();
                $ses->auth($row);
                redirectadmin('Adminhome');
            } else {
                $this->addError('password', "Incorrect password");
            }
        } else {
            $this->addError($this->loginUniqueColumn, "Incorect email");
        }
        
        
    }

}
