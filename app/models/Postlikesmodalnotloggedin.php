<?php

namespace app\models;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;

/**
 * Postlikesmodal class
 */
class Postlikesmodalnotloggedin
{
    use Model;

    protected $table = 'postlikesnotlogged';
    protected $primaryKey = 'likeID';
    protected $loginUniqueColumn = 'likeID';

    protected $allowedColumns = [

        'postID',
        'user_id',
        'disabled',

    ];
    public function userLikednotloggedin(int|string $user_id,int $postID)
    {
        if($this->first(['user_id' => $user_id,'postID' => $postID,'disabled' => 0])) {
            return true;
        }

        return false;
    }
    public function getLikesnotloggedin(int|string $postID)
    {
        $query = "
    SELECT 
        COALESCE(pl.likes_count, 0) + COALESCE(pnl.likes_count, 0) AS total_likes
    FROM 
        (SELECT postID, COUNT(*) AS likes_count
         FROM postlikes
         WHERE disabled = 0 AND postID = :postID
         GROUP BY postID) AS pl
    LEFT JOIN 
        (SELECT postID, COUNT(*) AS likes_count
         FROM postlikesnotlogged
         WHERE disabled = 0 AND postID = :postID
         GROUP BY postID) AS pnl
    ON pl.postID = pnl.postID
    GROUP BY pl.postID;
    ";

    $result = $this->query($query, ['postID' => $postID]);

    return $result[0]->total_likes ?? 0;
    }

}
