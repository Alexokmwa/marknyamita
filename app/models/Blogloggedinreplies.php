<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use app\models\Image;
use app\models\Session;

class Blogloggedinreplies
{
    use Model;

    protected $table = 'commentreplies';
    protected $primaryKey = 'replyID';
    protected $loginUniqueColumn = 'replyID';

    protected $allowedColumns = [
        'namereply',
        'emailreply',
        'commentID',
        'user_id',
        'Contentreply',
        'usercommentimage',
    ];
    protected $validationRules = [
        'namereply' => [
            'alpha_space',
            'required',
        ],
        'emailreply' => [
           'email',
            'required',
        ],
        'Contentreply' => [
            'required',
        ],
    ];

    public function addblogcommentreply($data,$commentid, $files, $userID, $postid)
    {
        if ($this->validate($data)) {
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");
            $data["user_id"] = $userID;
            $data["commentID"] = $commentid;
            $data["usercommentimage"] = "";

            if (!empty($files["usercommentimage"]["name"])) {
                $folder = "public/commentuploads/replieslogged/";
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
                $ses->set('comment_success', 'Your reply comment has been posted successfully.');
                
                redirect('Blogview/'.$postid);
            }
        }
    }
}
