<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use app\models\Image;

class Admineditpostmodal
{
    use Model;

    protected $table = 'blogposts';
    protected $primaryKey = 'postID';
    protected $loginUniqueColumn = 'postID';

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
            'alpha_numeric_symbol',
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

    public function admineditpost($idupdate, $data, $poststatus, $files, $adminID, $categoryID, $categoryname)
    {
        if ($this->validate($data)) {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $idupdate]);
            if ($currentPost) {
                $currentImageUrl = $currentPost->imageurl;
                $currentPostBody = $currentPost->postbody;
            }
            $blogimages = remove_images_from_content($data["postbody"]);
            $blogimages =  remove_root_from_content($blogimages);
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_updated'] = date("Y-m-d H:i:s");
            $data["adminID"] = $adminID;
            $data["postbody"] = $blogimages;
            $data["categoryID"] = $categoryID;
            $data["category"] = $categoryname;
            $data["poststatus"] = $poststatus;

            // Delete images that are in the current post body but not in the updated post body
            delete_images_from_contentevent($currentPostBody, $data["postbody"]);
            if (!empty($files["imageurl"]["name"])) {
                $folder = "admin/adminuploads/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', "");
                }
                $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (in_array($files["imageurl"]["type"], $allowed)) {
                    $destination = $folder . time() . $files["imageurl"]["name"];
                    if (move_uploaded_file($files["imageurl"]['tmp_name'], $destination)) {
                        $data["imageurl"] = $destination;
                        $image = new Image();
                        $image->resize($data["imageurl"], 700);

                        // Delete the old image if it exists
                        if (file_exists($currentImageUrl)) {
                            unlink($currentImageUrl);
                        }
                    }
                    $this->updateblog($idupdate, $data);
                    $ses = new Adminsession();

                    $ses->set('comment_success', 'POST edited successfully');
                    redirectadmin("Adminpostlist");
                    redirectadmin("Adminpostlist");
                } else {
                    $this->errors["imageurl"] = "the file type is not supported";
                }
            }
        } else {
            $this->addError('imageurl', "no image found, upload at least one image");
            $this->addError('category', "select category");
            $this->addError('status', "select post status");

        }
    }
}
