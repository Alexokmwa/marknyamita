<?php

namespace app\core;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Database;

/**
 * Main Model trait
 */
trait Model
{
    use Database;

    public $limit 		= 10;
    public $offset 		= 0;
    public $order_type 	= "desc";
    public $order_column = "id" ;
    public $order_columnadmin = "adminID" ;
    public $order_columnusers = "user_id" ;
    public $order_columncategories = "categoryID" ;
    public $order_columncomment = "commentID" ;
    public $order_columncommentreplyID = "replyID" ;
    public $order_columnpost = "postID" ;
    public $errors 		= [];

    public function findAll()
    {

        $query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }
    public function findAllcommentreplies()
    {

        $query = "select * from $this->table order by $this->order_columncommentreplyID $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }

    public function findAllusers()
    {

        $query = "select * from $this->table order by $this->order_columnusers $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }
    public function findAlladmin()
    {

        $query = "select * from $this->table order by $this->order_columnadmin $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }
    public function findAllcategories()
    {

        $query = "select * from $this->table order by $this->order_columncategories $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }

    public function findAllposts()
    {

        $query = "select * from $this->table order by $this->order_columnpost $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }
    // Method to count all posts
    public function countAllposts()
    {
        $query = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->query($query);
        return $result[0]->total ?? 0;
    }
    public function countPostLikesNotLogged()
    {
        $query = "SELECT COUNT(*) as total FROM postlikesnotlogged WHERE disabled = 0";
        $result = $this->query($query);
        return $result[0]->total ?? 0;
    }
    
    public function countPostLikes()
    {
        $query = "SELECT COUNT(*) as total FROM postlikes WHERE disabled = 0";
        $result = $this->query($query);
        return $result[0]->total ?? 0;
    }
    

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }
    public function wherecomment($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " order by $this->order_columncomment $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if($result) {
            return $result[0];
        }

        return false;
    }
    public function firstadminkeys($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->tablekeys where ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if($result) {
            return $result[0];
        }

        return false;
    }

    public function insert($data)
    {

        /** remove unwanted data **/
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {

                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);

        $query = "insert into $this->table (".implode(",", $keys).") values (:".implode(",:", $keys).")";
        $this->query($query, $data);

        return false;
    }
   

    public function update($id, $data, $id_column = 'id')
    {

        /** remove unwanted data **/
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {

                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " where $id_column = :$id_column ";

        $data[$id_column] = $id;

        $this->query($query, $data);
        return false;

    }
    public function updateblog($id, $data, $id_column = 'postID')
    {

        /** remove unwanted data **/
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {

                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " where $id_column = :$id_column ";

        $data[$id_column] = $id;

        $this->query($query, $data);
        return false;

    }
    public function updatebloglikes($id, $data, $id_column = 'likeID')
    {

        /** remove unwanted data **/
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {

                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " where $id_column = :$id_column ";

        $data[$id_column] = $id;

        $this->query($query, $data);
        return false;

    }

    public function delete($id, $id_column = 'id')
    {

        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column ";
        $this->query($query, $data);

        return false;

    }
    public function deleteblog($id, $id_column = 'postID')
    {

        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column ";
        $this->query($query, $data);

        return false;

    }


    public function getError($key)
    {
        if(!empty($this->errors[$key])) {
            return $this->errors[$key];
        }

        return "";
    }
    protected function addError($key, $message)
    {
        $this->errors[$key] = $message;
        return $this->errors;
    }

    public function getUniqueID($condition)
    {
        // Fetch the unique ID from the database based on the provided condition
        $result = $this->firstadminkeys($condition);

        if ($result) {
            return $result->uniqueID; // Adjust based on your actual column name
        }

        return null;
    }
    public function getUniquepassword($condition)
    {
        // Fetch the unique ID from the database based on the provided condition
        $result = $this->first($condition);

        if ($result) {
            return $result->password; // Adjust based on your actual column name
        }

        return null;
    }

    protected function getPrimaryKey()
    {

        return $this->primaryKey ?? 'id';
    }

    public function validate($data)
    {

        $this->errors = [];

        if(!empty($this->validationRules)) {
            foreach ($this->validationRules as $column => $rules) {

                if(!isset($data[$column])) {
                    continue;
                }

                foreach ($rules as $rule) {

                    switch ($rule) {
                        case 'required':

                            if(empty($data[$column])) {
                                $this->errors[$column] = ucfirst($column) . " is required";
                            }
                            break;

                        case 'requiredterms':

                            if(empty($data[$column])) {
                                $this->errors[$column] = ucfirst($column) . " Please accept the terms and conditions";
                            }
                            break;
                        case 'email':

                            if(!filter_var(trim($data[$column]), FILTER_VALIDATE_EMAIL)) {
                                $this->errors[$column] = "Invalid email address";
                            }
                            break;
                        case 'adminidcheck':

                            // Fetch the unique ID from the database based on the provided condition (e.g., email or any other condition)
                            $uniqueID = $this->getUniqueID(['uniqueID' => $data['uniqueID']]); // Adjust the condition as needed

                            // Check if the provided unique ID matches the fetched unique ID
                            if ($data['uniqueID'] !== $uniqueID) {
                                $this->errors['uniqueID'] = "Unique ID does not match.";
                                return false;
                            }
                            break;

                        case 'alpha':

                            if(!preg_match("/^[a-zA-Z]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only have aphabetical letters without spaces";
                            }
                            break;
                        case 'numeric':

                            if (!preg_match("/^[0-9]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contain numeric digits without spaces";
                            }
                            break;
                        case 'max_14_keywords_lowercase':
                            if (!preg_match("/^([a-zA-Z]+)(,[a-zA-Z]+){0,13}$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should contain a maximum of 14 keywords, all in alphabetic characters and separated by commas. E.g., 'JavaScript, React, Marketing'.";
                            }
                            break;

                        case 'alpha_space':
                            if (!preg_match("/^[a-zA-Z ]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contain alphabetical letters and spaces.";
                            }
                            break;

                        case 'alpha_numeric':
                            if (!preg_match("/^[a-zA-Z0-9]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contain alphanumeric characters.";
                            }
                            break;

                        case 'alpha_numeric_symbol':
                            if (!preg_match("/^[\p{L}\p{N}\p{P}\p{S}\p{Zs}]+$/u", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contain alphanumeric characters, punctuation, symbols, and spaces.";
                            }
                            break;


                        case 'alpha_symbol':
                            if (!preg_match("/^[a-zA-Z\-\_\$\%\*\[\]\(\)\& ]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contain alphabetical letters, hyphens, underscores, dollar signs, percent signs, asterisks, square brackets, parentheses, ampersands, and spaces.";
                            }
                            break;


                        case 'not_less_than_8_chars':

                            if(strlen(trim($data[$column])) < 8) {
                                $this->errors[$column] = ucfirst($column) . " should not be less than 8 characters";
                            }
                            break;
                        case 'passwordmatch':
                            if ($data['password'] !== $data['confirmpassword']) {
                                $this->errors[$column] = "Passwords do not match";
                            }
                            break;
                        case 'unique':

                            $key = $this->getPrimaryKey();
                            if(!empty($data[$key])) {
                                //edit mode
                                if($this->first([$column => $data[$column]], [$key => $data[$key]])) {
                                    $this->errors[$column] = ucfirst($column) . " already taken";
                                }
                            } else {
                                //insert mode
                                if($this->first([$column => $data[$column]])) {
                                    $this->errors[$column] = ucfirst($column) . " already taken";
                                }
                            }
                            break;

                        default:
                            $this->errors['rules'] = "The rule ". $rule . " was not found!";
                            break;
                    }
                }
            }
        }

        if(empty($this->errors)) {
            return true;
        }

        return false;
    }


}
