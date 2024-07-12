<?php

namespace admincombined;

use app\models\Adminsession;

/**
 * HTML pages header and main nav inclusion
 */
adminrenderHeader();

class AdminShownav extends Adminsession
{
    public function adminshowexpectednav()
    {
        // Instantiate the Session object
        $ses = new Adminsession();

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
