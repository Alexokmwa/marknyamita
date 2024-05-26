<?php

namespace publiccombined;

use app\models\Session;

/**
 * HTML pages header and main nav inclusion
 */
renderHeader();

class Shownav extends Session
{
    public function showexpectednav()
    {
        // Instantiate the Session object
        $ses = new Session();

        // Check if the user is logged in
        if ($ses->isLoggedIn()) {
            // Render the main navigation for logged-in users
            renderMainNavloggedin();
        } else {
            renderMainNav();
            // Render the main navigation for guests
        }
    }
}

// Example usage
$shownav = new Shownav();
$shownav->showexpectednav();
