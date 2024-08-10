<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use app\models\Adminsession;
use app\models\Image;

class Adminpostsmodel
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

    public function adminaddpost($data, $poststatus, $files, $adminID, $categoryID, $categoryname)
    {
        if ($this->validate($data)) {
            $blogimages = remove_images_from_content($data["postbody"]);
            $blogimages =  remove_root_from_content($blogimages);
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");
            $data["adminID"] = $adminID;
            $data["postbody"] = $blogimages;
            $data["categoryID"] = $categoryID;
            $data["category"] = $categoryname;
            $data["poststatus"] = $poststatus;

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
                    }
                    $this->insert($data);

                    $ses = new Adminsession();

                    $ses->set('comment_success', 'POST created successfully');
                    redirectadmin("Adminpostlist");



                } else {
                    $this->errors["imageurl"] = "the file type is not supported";
                }
            }
        } else {
            $this->addError('imageurl', "no image found, upload at least one image");
            $this->addError('category', "select category");
            $this->addError('postbody', "please write main blog content");
            $this->addError('status', "select post status");
        }
    }
    public function getCategoriesNumber(string $category)
    {
        // Define the query
        $query = "SELECT COUNT(postID) as total FROM blogposts WHERE category = :category";

        // Execute the query with the provided postID
        $result = $this->query($query, ['category' => $category]);

        // Return the total count of categories or 0 if not found
        return $result[0]->total ?? 0;
    }

}
