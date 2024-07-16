<?php

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;

class Admincategories
{
    use Model;

    protected $table = 'categories';
    protected $primaryKey = 'categoryID';
    protected $loginUniqueColumn = 'categoryID';

    protected $allowedColumns = [
        'categoryname',
        'categorydescription',
    ];

    protected $validationRules = [
        'categoryname' => [
            'unique',
            'required',
        ],
        'categorydescription' => [
            'alpha',
            'required',
        ],
    ];

    public function adminaddcategory($data)
    {
        $result = ['success' => false, 'errors' => $this->errors];

        if ($this->validate($data)) {
            $data['date'] = date("Y-m-d H:i:s");
            $data['date_created'] = date("Y-m-d H:i:s");

            try {
                $this->insert($data);
                $result['success'] = true;
            } catch (\Exception $e) {
                error_log('Error inserting category: ' . $e->getMessage());
                $result['errors'][] = 'Error inserting category: ' . $e->getMessage();
            }
        } else {
            $result['errors'] = $this->errors;
        }

        return $result;
    }
}
