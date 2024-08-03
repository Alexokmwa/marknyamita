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

    public function addblogcommentreply($postData,$commentid, $files, $userID, $postid)
    {
        if ($this->validate($postData)) {
            $postData['date'] = date("Y-m-d H:i:s");
            $postData['date_created'] = date("Y-m-d H:i:s");
            $postData["user_id"] = $userID;
            $postData["commentID"] = $commentid;
            $postData["usercommentimage"] = "";

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
                        $postData["usercommentimage"] = $destination;
                        $image = new Image();
                        $image->resize($postData["usercommentimage"], 700);
                    }
                } else {
                    $this->errors["usercommentimage"] = "The file type is not supported.";
                }
            }

            if (empty($this->errors)) {
                $this->insert($postData);
                $ses = new Session();
                $ses->set('comment_success', 'Your reply comment has been posted successfully.');
                
                redirect('Blogview/'.$postid);
            }
        }
    }
    public function editblogcommentreply($idupdatereply,$postData, $commentid, $files, $userID, $postid)
    {
        if ($this->validate($postData)) {
            $postData['date'] = date("Y-m-d H:i:s");
            $postData['date_created'] = date("Y-m-d H:i:s");
            $postData["user_id"] = $userID;
            $postData["postID"] = $postid;
            // $postData["usercommentimage"] = "";

           // Fetch the current image URL from the database
           $currentPost = $this->first([$this->primaryKey =>  $idupdatereply]);
           if ($currentPost) {
               $currentusercommentimage = $currentPost->usercommentimage;
           }
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
                       $postData["usercommentimage"] = $destination;
                       $image = new Image();
                       $image->resize($postData["usercommentimage"], 700);

                       // Delete the old image if it exists
                       if (file_exists($currentusercommentimage)) {
                           unlink($currentusercommentimage);
                       }
                   }
                } else {
                    $this->errors["usercommentimage"] = "the file type is not supported";
                }
            }
            
            if (empty($this->errors)) {
                $this->updatecommentreply( $idupdatereply, $postData);
                $ses = new Session();
                $ses->set('comment_success', 'Your comment has been edited successfully.');
                
                redirect('Blogview/'.$postid);
            }
        }
    }
    public function deletereply($commentID,$postid)
    {
    
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $commentID]);
    
            if ($currentPost) {
                $currentusercommentimage = $currentPost->usercommentimage;
    
                // Delete the old image if it exists
                if ($currentusercommentimage && file_exists($currentusercommentimage)) {
                    unlink($currentusercommentimage);
                }
    
                // Delete the post from the database
                
                if (empty($this->errors)) {
                    $this->deletecommentreply($commentID);
                    $ses = new Session();
                    $ses->set('comment_success', 'Your reply comment has been posted successfully.');
                    
                    redirect('Blogview/'.$postid);
                }
            } 
        
    }
}
