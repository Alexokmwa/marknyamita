<?php

namespace app\models\eventmodels;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use Exception;

class Admindeleteeventcategorymodel
{
    use Model;

    protected $table = 'eventcategories';
    protected $primaryKey = 'categoryID';
    protected $loginUniqueColumn = 'categoryID';

    protected $allowedColumns = [
        'categoryname',
        'categorydescription',
        'categorystatus',
        'admid',

    ];

    protected $validationRules = [
        'categoryname' => [
            'unique',
            'required',
        ],
        'categorydescription' => [
            'alpha_symbol',
            'required',
        ],
    ];


    public function restoreeventcategory($categoryID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $categoryID]);

            if ($currentPost) {
                // Delete the post from the database
                $this->updatecategory($categoryID, ['categorystatus' => 'active']);

                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }
    public function addeventtotrashcategory($categoryID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $categoryID]);

            if ($currentPost) {
                // Delete the post from the database
                $this->updatecategory($categoryID, ['categorystatus' => 'deleted']);

                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }
    public function deleteeventcategory($categoryID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $categoryID]);

            if ($currentPost) {
                // Delete the post from the database
                $this->deletecategory($categoryID);

                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }


}
