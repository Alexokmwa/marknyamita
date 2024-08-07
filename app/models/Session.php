<?php

/**
 * Session class
 * Save or read data to the current session
 */

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');

class Session
{
    public $mainkey = 'APPPUBLIC';
    public $userkey = 'USERPUBLIC';

    private $sessionIDKey = 'SESSIONID'; 
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

    /** saves the user row data into the session after a login **/
    public function auth(mixed $user_row): int
    {
        $this->startSession();

        $_SESSION[$this->userkey] = $user_row;

        return 0;
    }

    /** removes user data from the session **/
    public function logout(): int
    {
        $this->startSession();

        if(!empty($_SESSION[$this->userkey])) {

            unset($_SESSION[$this->userkey]);
        }

        return 0;
    }

    /** checks if user is logged in **/
    public function isLoggedIn(): bool
    {
        $this->startSession();

        if(!empty($_SESSION[$this->userkey])) {

            return true;
        }

        return false;
    }

    /** gets data from a column in the session user data **/
    public function user(string $key = '', mixed $default = ''): mixed
    {
        $this->startSession();

        if(empty($key) && !empty($_SESSION[$this->userkey])) {

            return $_SESSION[$this->userkey];
        } elseif(!empty($_SESSION[$this->userkey]->$key)) {

            return $_SESSION[$this->userkey]->$key;
        }

        return $default;
    }
    public function nonLoggedUserSession(string $user_id): array
{
    $this->startSession();

    if (isset($_SESSION[$user_id])) {
        return $_SESSION[$user_id];
    }

    return [];
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
      /** generate and get unique session ID for logged-out users **/
      public function getSessionID(): string
      {
          $this->startSession();
  
          if (!isset($_SESSION[$this->sessionIDKey])) {
              $_SESSION[$this->sessionIDKey] = bin2hex(random_bytes(16)); // Generate unique session ID
          }
  
          return $_SESSION[$this->sessionIDKey];
      }


}
