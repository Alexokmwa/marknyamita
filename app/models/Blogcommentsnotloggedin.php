<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use app\models\Image;

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
            'alpha',
            'required',
        ],
        'email' => [
           'email',
            'required',
        ],
        'Content' => [
            'required',
        ],
        'usercommentimage' => [
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
                    $this->insert($data);
                    redirect('Blogview/'.$postid);

                } else {
                    $this->errors["usercommentimage"] = "the file type is not supported";
                }
            }
        } else {
            $this->addError('usercommentimage', "no image found, upload at least one image");

        }
    }
}
