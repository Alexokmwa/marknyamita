<?php

namespace app\models\eventmodels;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Model;
use Exception;

class Admindleteeventmodel
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
        'eventcharges',
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
        'eventcharges' => [
            'required',
        ],
        'featured' => [],
    ];

    public function deleteeventtotrash($eventID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $eventID]);

            if ($currentPost) {



                $this->updateevent($eventID, ['poststatus' => 'deleted']);

                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }
    public function restoreeventfromtrash($eventID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $eventID]);

            if ($currentPost) {



                $this->updateevent($eventID, ['poststatus' => 'active']);


                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }
    // delete post completely form trash
    public function admindeleteevent($eventID)
    {
        try {
            // Fetch the current image URL from the database
            $currentPost = $this->first([$this->primaryKey => $eventID]);

            if ($currentPost) {
                $currenteventimage = $currentPost->eventimage;

                // Delete the old image if it exists
                if ($currenteventimage && file_exists($currenteventimage)) {
                    unlink($currenteventimage);
                }

                // Delete the post from the database
                $this->deleteevent($eventID);

                return ['success' => true, 'message' => 'Delete successful'];
            } else {
                return ['success' => false, 'message' => 'Delete failed'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error deleting post: ' . $e->getMessage()];
        }
    }

}
