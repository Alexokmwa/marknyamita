<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use Exception;

class Admindeletepostmodel
{
    use Model;

    protected $table = 'blogposts';
    protected $primaryKey = 'postID';

    protected $allowedColumns = [
        'adminID',
        'postname',
        'posttype',
        'shortdescription',
        'postbody',
        'imageurl',
        'tags',
        'category',
        'status',
        'featured',
        'categoryID',
        'poststatus',
    ];

    protected $validationRules = [
        'postname' => [
            'alpha',
            'required',
        ],
        'posttype' => [
            'required',
        ],
        'shortdescription' => [
            'required',
            'alpha_numeric_symbol',
        ],
        'postbody' => [
            'required',
        ],
        'imageurl' => [
            'required',
        ],
        'tags' => [
            'max_14_keywords_lowercase',
            'required',
        ],
        'category' => [
            'required',
        ],
        'status' => [
            'required',
        ],
        'featured' => [],
    ];

    public function deletePosttotrash($postID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $postID]);

            if ($currentPost) {



                $this->updateblog($postID, ['poststatus' => 'deleted']);

                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }
    public function restorepostfromtrash($postID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $postID]);

            if ($currentPost) {



                $this->updateblog($postID, ['poststatus' => 'active']);


                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }
    // delete post completely form trash
    public function deletePost($postID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $postID]);

            if ($currentPost) {
                $currentImageUrl = $currentPost->imageurl;

                // Delete the old image if it exists
                if ($currentImageUrl && file_exists($currentImageUrl)) {
                    unlink($currentImageUrl);
                }

                // Delete any images embedded in the event content
                $currentContent = $currentPost->postbody;
                delete_images_from_contentevent($currentContent);
                // Delete the post from the database
                $this->deleteblog($postID);

                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }
}
