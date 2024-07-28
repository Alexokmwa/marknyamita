<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;

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

    public function admineditpost($postID)
    {
        // Fetch the current image URL from the database
        $currentPost = $this->first([$this->primaryKey => $postID]);
        if ($currentPost) {
            $currentImageUrl = $currentPost->imageurl;

            // Delete the old image if it exists
            if ($currentImageUrl && file_exists($currentImageUrl)) {
                unlink($currentImageUrl);
            }

            // Delete the post from the database
            $this->deleteblog($postID);

            // Redirect to the post list
            redirectadmin('Adminpostlist');
        }
    }
}
