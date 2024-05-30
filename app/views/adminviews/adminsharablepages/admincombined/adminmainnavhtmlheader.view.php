<?php

namespace admincombined;

use app\models\Session;

/**
 * HTML pages header and main nav inclusion
 */
adminrenderHeader();

class AdminShownav extends Session
{
    public function adminshowexpectednav()
    {
        // Instantiate the Session object
        $ses = new Session();

        // Check if the user is logged in
        if ($ses->isLoggedIn()) {
            // Render the main navigation for logged-in users
            adminrenderMainNavloggedin();
        } else {
            adminrenderMainNav();
            // Render the main navigation for guests
        }
    }
}

// Example usage
$Adminshownav = new AdminShownav();
$Adminshownav->adminshowexpectednav();
