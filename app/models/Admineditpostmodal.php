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

    public function admineditpost($idupdate, $data, $files, $adminID)
    {
        if ($this->validate($data)) {
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_updated'] = date("Y-m-d H:i:s");
            $data["adminID"] = $adminID;
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
                    $this->updateblog($idupdate, $data);
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
            $this->addError('postname', "input post name");
            $this->addError('tags', "input tag name");
            $this->addError('shortdescription', "input tag shortdescription");
            $this->addError('posttype', "input tag posttype");
        }
    }
}
