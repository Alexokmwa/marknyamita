<?php

namespace app\models;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;

use app\models\Session;

/**
 * User class
 */
class User
{
    use Model;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $loginUniqueColumn = 'email';

    protected $allowedColumns = [

        'firstname',
        'lastname',
        'username',
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
        symbol
        longer_than_8_chars
        alpha_numeric_symbol
        alpha_numeric
        alpha_symbol
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
            'required',
            'not_less_than_8_chars',

            'passwordmatch',
        ],
        'terms' => [
            'requiredterms',
        ],
    ];

    public function signup($data)
    {
        if($this->validate($data)) {
            //add extra user columns here
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");

            $this->insert($data);
            redirect('login');
        }
    }

    public function login($data)
    {
        $row = $this->first([$this->loginUniqueColumn => $data[$this->loginUniqueColumn]]);

        if($row) {

            //confirm password
            if(password_verify($data['password'], $row->password)) {
                $ses = new Session();
                $ses->auth($row);
                redirect('home');
            } else {
                $this->addError('password', "Incorrect password");
            }
        } else {
            $this->addError($this->loginUniqueColumn, "Incorect email");
        }
    }

}
