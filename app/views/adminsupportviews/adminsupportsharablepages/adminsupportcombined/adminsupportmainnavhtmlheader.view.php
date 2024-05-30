<?php

namespace publiccombined;

use app\models\Session;

/**
 * HTML pages header and main nav inclusion
 */
adminsupportrenderHeader();
class AdminsupportShownav extends Session
{
    public function adminsupportshowexpectednav()
    {
        // Instantiate the Session object
        $ses = new Session();

        // Check if the user is logged in
        if ($ses->isLoggedIn()) {
            // Render the main navigation for logged-in users
            adminsupportrenderMainNavloggedin();
        } else {
            adminsupportrenderMainNav();
            // Render the main navigation for guests
        }
    }
}

// Example usage
$Adminsupportshownav = new AdminsupportShownav();
$Adminsupportshownav->adminsupportshowexpectednav();
