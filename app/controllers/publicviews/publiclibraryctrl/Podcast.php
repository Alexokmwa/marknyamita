<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;

/**
 * resource class
 */
class Podcast extends Controller
{
    public function index()
    {

        $this ->view('publicviews/publiclibrary/podcast');
    }
}
