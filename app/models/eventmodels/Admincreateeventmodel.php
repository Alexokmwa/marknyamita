<?php

namespace app\models\eventmodels;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use app\models\Adminsession;
use app\models\Image;

class Admincreateeventmodel
{
    use Model;

    protected $table = 'Events';
    protected $primaryKey = 'eventID';
    protected $loginUniqueColumn = 'eventID';

    protected $allowedColumns = [
        'adminID',
        'eventname',
        'eventimage',
        'category',
        'categoryID',
        'eventlocation',
        'status',
        'poststatus',
        'eventtype',
        'eventschedule',
        'eventdate',
        'timestart',
        'endtime',
        'eventdescription',
        'featured',
    ];

    protected $validationRules = [
        'eventname' => [
            'alpha_numeric_symbol',

            'required',
        ],
        'eventimage' => [
            'required',
        ],

        'category' => [
            'required',
        ],
        'eventlocation' => [
            'required',
            'alpha_numeric_symbol',
        ],
        'status' => [
            'required',
        ],
        'eventtype' => [
            'required',
        ],
        'eventschedule' => [
            'required',
        ],

        'eventdate' => [
            'required',
        ],
        'timestart' => [
            'required',
        ],
        'endtime' => [
            'required',
        ],
        'eventdescription' => [
            'required',
        ],
        'featured' => [],
    ];

    public function adminaddevent($data, $poststatus, $files, $adminID, $categoryID, $categoryname)
    {
        if ($this->validate($data)) {
            $blogimages = remove_images_from_contentevent($data["eventdescription"]);
            $blogimages =  remove_root_from_content($blogimages);
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");
            $data["adminID"] = $adminID;
            $data["eventdescription"] = $blogimages;
            $data["categoryID"] = $categoryID;
            $data["category"] = $categoryname;
            $data["poststatus"] = $poststatus;

            if (!empty($files["eventimage"]["name"])) {
                $folder = "admin/eventsuploads/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', "");
                }
                $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (in_array($files["eventimage"]["type"], $allowed)) {
                    $destination = $folder . time() . $files["eventimage"]["name"];
                    if (move_uploaded_file($files["eventimage"]['tmp_name'], $destination)) {
                        $data["eventimage"] = $destination;
                        $image = new Image();
                        $image->resize($data["eventimage"], 700);
                    }
                    $this->insert($data);

                    $ses = new Adminsession();

                    $ses->set('comment_success', 'Event created successfully');
                    redirectadmin("Admineventlist");



                } else {
                    $this->errors["eventimage"] = "the file type is not supported";
                }
            }
        } else {
            $this->addError('eventimage', "no image found, upload at least one image");
            $this->addError('category', "select category");
            $this->addError('status', "select post status");
        }
    }
    public function geteventCategoriesNumber(string $category)
    {
        // Define the query
        $query = "SELECT COUNT(eventID) as total FROM Events WHERE category = :category";

        // Execute the query with the provided postID
        $result = $this->query($query, ['category' => $category]);

        // Return the total count of categories or 0 if not found
        return $result[0]->total ?? 0;
    }

}
