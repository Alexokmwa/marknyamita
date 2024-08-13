<?php

namespace app\models\eventmodels;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use Exception;

class Admineventcategoriesmodel
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

    public function adminaddeventcategory($data, $admid, $status)
    {
        $result = ['success' => false, 'errors' => $this->errors];

        if ($this->validate($data)) {
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");
            $data['admid'] = $admid;
            $data['categorystatus'] = $status;

            try {
                $this->insert($data);
                $result['success'] = true;
            } catch (Exception $e) {
                error_log('Error inserting category: ' . $e->getMessage());
                $result['errors'][] = 'Error inserting category: ' . $e->getMessage();
            }
        } else {
            $result['errors'] = $this->errors;
        }

        return $result;
    }

}
