<?php

namespace app\models;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;

/**
 * Postlikesmodal class
 */
class Postlikesmodal
{
    use Model;

    protected $table = 'postlikes';
    protected $primaryKey = 'likeID';
    protected $loginUniqueColumn = 'likeID';

    protected $allowedColumns = [

        'postID',
        'user_id',
        'disabled',

    ];
    public function userLiked(int $user_id, int $postID)
    {
        if($this->first(['user_id' => $user_id,'postID' => $postID,'disabled' => 0])) {
            return true;
        }

        return false;
    }
    public function getLikes(int $postID)
    {
        $query = "SELECT count(likeID) as total from postlikes where postID = :postID && disabled = 0";
        $row = $this->query($query, ['postID' => $postID]);

        return $row[0]->total;
    }

}
