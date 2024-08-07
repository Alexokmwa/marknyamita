<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use app\models\Image;
use app\models\Session;

class Blogcommentsnotloggedin
{
    use Model;

    protected $table = 'commentsnotloggedin';
    protected $primaryKey = 'commentID';
    protected $loginUniqueColumn = 'commentID';


    protected $allowedColumns = [
        'name',
        'email',
        'postID',
        'user_id',
        'Content',
        'usercommentimage',
    ];

    protected $validationRules = [
        'name' => [
            'alpha_space',
            'required',
        ],
        'email' => [
           'email',
            'required',
        ],
        'Content' => [
            'required',
        ],
    ];


    public function addblogcommentnotloggedin($data, $files, $userID, $postid)
    {
        if ($this->validate($data)) {
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");
            $data["user_id"] = $userID;
            $data["postID"] = $postid;
            $data["usercommentimage"] = "";

            if (!empty($files["usercommentimage"]["name"])) {
                $folder = "public/commentuploads/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', "");
                }
                $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (in_array($files["usercommentimage"]["type"], $allowed)) {
                    $destination = $folder . time() . $files["usercommentimage"]["name"];
                    if (move_uploaded_file($files["usercommentimage"]['tmp_name'], $destination)) {
                        $data["usercommentimage"] = $destination;
                        $image = new Image();
                        $image->resize($data["usercommentimage"], 700);
                    }
                } else {
                    $this->errors["usercommentimage"] = "The file type is not supported.";
                }
            }

            if (empty($this->errors)) {
                $this->insert($data);
                $ses = new Session();

                $ses->set('comment_success', 'Your comment has been posted successfully.');
                redirect('Blogview/'.$postid);
            }
        }
    }
    public function getcommentsnotlogged(int $postID)
    {
       $query = "
    SELECT 
        COALESCE(pl.likes_count, 0) + COALESCE(pnl.likes_count, 0) AS total_likes
    FROM 
        (SELECT postID, COUNT(*) AS likes_count
         FROM comments
         WHERE postID = :postID
         GROUP BY postID) AS pl
    LEFT JOIN 
        (SELECT postID, COUNT(*) AS likes_count
         FROM commentsnotloggedin
         WHERE postID = :postID
         GROUP BY postID) AS pnl
    ON pl.postID = pnl.postID
    GROUP BY pl.postID;
    ";

    $result = $this->query($query, ['postID' => $postID]);

    return $result[0]->total_likes ?? 0;
    }

}
