<?php

/**
 * Session class
 * Save or read data to the current session
 */

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');

class Adminsession
{
    public $mainkey = 'APPADMIN';
    public $adminuserkey = 'ADMIN';

    /** activate session if not yet started **/
    private function startSession(): int
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return 1;
    }

    /** put data into the session **/
    public function set(mixed $keyOrArray, mixed $value = ''): int
    {
        $this->startSession();

        if(is_array($keyOrArray)) {
            foreach ($keyOrArray as $key => $value) {

                $_SESSION[$this->mainkey][$key] = $value;
            }

            return 1;
        }

        $_SESSION[$this->mainkey][$keyOrArray] = $value;

        return 1;
    }

    /** get data from the session. default is return if data not found **/
    public function get(string $key, mixed $default = ''): mixed
    {

        $this->startSession();

        if(isset($_SESSION[$this->mainkey][$key])) {
            return $_SESSION[$this->mainkey][$key];
        }

        return $default;
    }

    /** saves the adminuser row data into the session after a login **/
    public function auth(mixed $adminuser_row): int
    {
        $this->startSession();

        $_SESSION[$this->adminuserkey] = $adminuser_row;

        return 0;
    }

    /** removes adminuser data from the session **/
    public function logout(): int
    {
        $this->startSession();

        if(!empty($_SESSION[$this->adminuserkey])) {

            unset($_SESSION[$this->adminuserkey]);
        }

        return 0;
    }

    /** checks if adminuser is logged in **/
    public function isLoggedIn(): bool
    {
        $this->startSession();

        if(!empty($_SESSION[$this->adminuserkey])) {

            return true;
        }

        return false;
    }

    /** gets data from a column in the session adminuser data **/
    public function adminuser(string $key = '', mixed $default = ''): mixed
    {
        $this->startSession();

        if(empty($key) && !empty($_SESSION[$this->adminuserkey])) {

            return $_SESSION[$this->adminuserkey];
        } elseif(!empty($_SESSION[$this->adminuserkey]->$key)) {

            return $_SESSION[$this->adminuserkey]->$key;
        }

        return $default;
    }

    /** returns data from a key and deletes it **/
    public function pop(string $key, mixed $default = ''): mixed
    {
        $this->startSession();

        if(!empty($_SESSION[$this->mainkey][$key])) {

            $value = $_SESSION[$this->mainkey][$key];
            unset($_SESSION[$this->mainkey][$key]);
            return $value;
        }

        return $default;
    }

    /** returns all data from the APP array **/
    public function all(): mixed
    {
        $this->startSession();

        if(isset($_SESSION[$this->mainkey])) {
            return $_SESSION[$this->mainkey];
        }

        return [];
    }


}
