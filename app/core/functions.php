<?php

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\models\Session;
use app\models\Adminsession;
use app\models\Image;

/** check which php extensions are required **/
check_extensions();
function check_extensions()
{

    $required_extensions = [

        'gd',
        'mysqli',
        'pdo_mysql',
        'pdo_sqlite',
        'curl',
        'fileinfo',
        'intl',
        'exif',
        'mbstring',
    ];

    $not_loaded = [];

    foreach ($required_extensions as $ext) {

        if(!extension_loaded($ext)) {
            $not_loaded[] = $ext;
        }
    }

    if(!empty($not_loaded)) {
        show("Please load the following extensions in your php.ini file: <br>".implode("<br>", $not_loaded));
        die;
    }
}

function user(string $key = '')
{

    $ses = new Session();

    $row = $ses->user();

    if(!empty($row->$key)) {

        return $row->$key;
    }

    return '';
}
function adminuser(string $key = '')
{

    $ses = new Adminsession();

    $row = $ses-> adminuser();

    if(!empty($row->$key)) {

        return $row->$key;
    }

    return '';
}
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str)
{
    return htmlspecialchars($str);
}

function redirect($path)
{
    header("Location: " . ROOT.$path);
    // header("Location: " . ROOT."/".$path);
    die;
}
function redirectadmin($path)
{
    // header("Location: " . ROOTADMIN."/".$path);
    header("Location: " . ROOTADMIN.$path);
    die;
}

/** load image. if not exist, load placeholder **/
function get_image(mixed $file = '', string $type = 'post'): string
{

    $file = $file ?? '';
    if(file_exists($file)) {
        return ROOT . "/". $file;
    }

    if($type == 'user') {
        return ROOT."assets/images/user.webp";
    } else {
        return ROOT."assets/images/no_image.jpg";
    }

}


/** returns pagination links **/
function get_pagination_vars(): array
{
    $vars = [];
    $vars['page'] 		= $_GET['page'] ?? 1;
    $vars['page'] 		= (int)$vars['page'];
    $vars['prev_page'] 	= $vars['page'] <= 1 ? 1 : $vars['page'] - 1;
    $vars['next_page'] 	= $vars['page'] + 1;

    return $vars;
}


/** saves or displays a saved message to the user **/
function message(string $msg = null, bool $clear = false)
{


    $ses 	= new Session();

    if(!empty($msg)) {
        $ses->set('message', $msg);
    } elseif(!empty($ses->get('message'))) {

        $msg = $ses->get('message');

        if($clear) {
            $ses->pop('message');
        }
        return $msg;
    }

    return false;
}
function adminmessage(string $msg = null, bool $clear = false)
{


    $ses = new Adminsession();


    if(!empty($msg)) {
        $ses->set('adminmessage', $msg);
    } elseif(!empty($ses->get('adminmessage'))) {

        $msg = $ses->get('adminmessage');

        if($clear) {
            $ses->pop('adminmessage');
        }
        return $msg;
    }

    return false;
}

/** return URL variables **/
function URL($key): mixed
{
    $URL = $_GET['url'] ?? 'home';
    $URL = explode("/", trim($URL, "/"));

    switch ($key) {
        case 'page':
        case 0:
            return $URL[0] ?? null;
            break;
        case 'section':
        case 'slug':
        case 1:
            return $URL[1] ?? null;
            break;
        case 'action':
        case 2:
            return $URL[2] ?? null;
            break;
        case 'id':
        case 3:
            return $URL[3] ?? null;
            break;
        default:
            return null;
            break;
    }

}


/** displays input values after a page refresh **/
function old_checked(string $key, string $value, string $default = ""): string
{

    if(isset($_POST[$key])) {
        if($_POST[$key] == $value) {
            return ' checked ';
        }
    } else {

        if($_SERVER['REQUEST_METHOD'] == "GET" && $default == $value) {
            return ' checked ';
        }
    }

    return '';
}


function old_value(string $key, mixed $default = "", string $mode = 'post'): mixed
{
    $POST = ($mode == 'post') ? $_POST : $_GET;
    if(isset($POST[$key])) {
        return $POST[$key];
    }

    return $default;
}

function old_select(string $key, mixed $value, mixed $default = "", string $mode = 'post'): mixed
{
    $POST = ($mode == 'post') ? $_POST : $_GET;
    if(isset($POST[$key])) {
        if($POST[$key] == $value) {
            return " selected ";
        }
    } elseif($default == $value) {
        return " selected ";
    }

    return "";
}

/** returns a user readable date format **/
function get_date($date)
{
    return date("jS M, Y", strtotime($date));
}


/** comverts image paths from relative to absolute **/
function add_root_to_images($contents)
{

    preg_match_all('/<img[^>]+>/', $contents, $matches);
    if(is_array($matches) && count($matches) > 0) {

        foreach ($matches[0] as $match) {

            preg_match('/src="[^"]+/', $match, $matches2);
            if(!strstr($matches2[0], 'http')) {

                $contents = str_replace($matches2[0], 'src="'.ROOT.'/'.str_replace('src="', "", $matches2[0]), $contents);
            }
        }

    }

    return $contents;
}

/** converts images from text editor content to actual files **/
function remove_images_from_content($content, $folder = "uploads/")
{

    if(!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder."index.php", "Access Denied!");
    }

    //remove images from content
    preg_match_all('/<img[^>]+>/', $content, $matches);
    $new_content = $content;

    if(is_array($matches) && count($matches) > 0) {

        $image_class = new Image();
        foreach ($matches[0] as $match) {

            if(strstr($match, "http")) {
                //ignore images with links already
                continue;
            }

            // get the src
            preg_match('/src="[^"]+/', $match, $matches2);

            // get the filename
            preg_match('/data-filename="[^\"]+/', $match, $matches3);

            if(strstr($matches2[0], 'data:')) {

                $parts = explode(",", $matches2[0]);
                $basename = $matches3[0] ?? 'basename.jpg';
                $basename = str_replace('data-filename="', "", $basename);

                $filename = $folder . "img_" . sha1(rand(0, 9999999999)) . $basename;

                $new_content = str_replace($parts[0] . ",". $parts[1], 'src="'.$filename, $new_content);
                file_put_contents($filename, base64_decode($parts[1]));

                //resize image
                $image_class->resize($filename, 1000);
            }

        }
    }

    return $new_content;

}

/** deletes images from text editor content **/
function delete_images_from_content(string $content, string $content_new = ''): void
{

    //delete images from content
    if(empty($content_new)) {

        preg_match_all('/<img[^>]+>/', $content, $matches);

        if(is_array($matches) && count($matches) > 0) {
            foreach ($matches[0] as $match) {

                preg_match('/src="[^"]+/', $match, $matches2);
                $matches2[0] = str_replace('src="', "", $matches2[0]);

                if(file_exists($matches2[0])) {
                    unlink($matches2[0]);
                }

            }
        }
    } else {

        //compare old to new and delete from old what inst in the new
        preg_match_all('/<img[^>]+>/', $content, $matches);
        preg_match_all('/<img[^>]+>/', $content_new, $matches_new);

        $old_images = [];
        $new_images = [];

        /** collect old images **/
        if(is_array($matches) && count($matches) > 0) {
            foreach ($matches[0] as $match) {

                preg_match('/src="[^"]+/', $match, $matches2);
                $matches2[0] = str_replace('src="', "", $matches2[0]);

                if(file_exists($matches2[0])) {
                    $old_images[] = $matches2[0];
                }

            }
        }

        /** collect new images **/
        if(is_array($matches_new) && count($matches_new) > 0) {
            foreach ($matches_new[0] as $match) {

                preg_match('/src="[^"]+/', $match, $matches2);
                $matches2[0] = str_replace('src="', "", $matches2[0]);

                if(file_exists($matches2[0])) {
                    $new_images[] = $matches2[0];
                }

            }
        }


        /** compare and delete all that dont appear in the new array **/
        foreach ($old_images as $img) {

            if(!in_array($img, $new_images)) {

                if(file_exists($img)) {
                    unlink($img);
                }
            }
        }
    }

}

/**
 * all public rendering functions are defined here
 */

//html headermainnav render function
function renderpageHeader()
{
    // Define the path to the footer file
    $headermainnav = '../app/views/publicviews/publicsharable/publiccombined/mainnavhtmlheader.view.php';

    // Check if the file exists before including it
    if (file_exists($headermainnav)) {
        include($headermainnav);
    } else {
        echo "Footer file not found: " . $headermainnav;
    }
}
function renderblogpageHeader()
{
    // Define the path to the footer file
    $blogheadermainnav = '../app/views/publicviews/publicsharable/publiccombined/blogmainnavhtmlheader.view.php';

    // Check if the file exists before including it
    if (file_exists($blogheadermainnav)) {
        include($blogheadermainnav);
    } else {
        echo "Footer file not found: " . $blogheadermainnav;
    }
}
//html htmlfooter render function

function renderHtmlFooter()
{
    // Define the path to the footer file
    $footerPath = '../app/views/publicviews/publicsharable/publichtmlheaderfooter/footer.view.php';

    // Check if the file exists before including it
    if (file_exists($footerPath)) {
        include($footerPath);
    } else {
        echo "Footer file not found: " . $footerPath;
    }
}
function renderblogHtmlFooter()
{
    // Define the path to the footer file
    $blogfooterPath = '../app/views/publicviews/publicsharable/publichtmlheaderfooter/blogfooter.view.php';

    // Check if the file exists before including it
    if (file_exists($blogfooterPath)) {
        include($blogfooterPath);
    } else {
        echo "Footer file not found: " . $blogfooterPath;
    }
}
function rendermainFooter()
{
    // Define the path to the footer file
    $footerPath = '../app/views/publicviews/publicsharable/publicnavfooters/mainfooter.view.php';

    // Check if the file exists before including it
    if (file_exists($footerPath)) {
        include($footerPath);
    } else {
        echo "Footer file not found: " . $footerPath;
    }
}

//html headerhtml render function

function renderHeader()
{
    // Define the path to the footer file
    $headerhtml = '../app/views/publicviews/publicsharable/publichtmlheaderfooter/header.view.php';

    // Check if the file exists before including it
    if (file_exists($headerhtml)) {
        include($headerhtml);
    } else {
        echo "Footer file not found: " . $headerhtml;
    }
}
function renderblogHeader()
{
    // Define the path to the footer file
    $blogheaderhtml = '../app/views/publicviews/publicsharable/publichtmlheaderfooter/blogheader.view.php';

    // Check if the file exists before including it
    if (file_exists($blogheaderhtml)) {
        include($blogheaderhtml);
    } else {
        echo "Footer file not found: " . $blogheaderhtml;
    }
}


/**
 * smaller screen footer
 *
 * @return void
 */
function rendersmfooter()
{
    // Define the path to the footer file
    $mfooter = '../app/views/publicviews/publicsharable/publicsmallerscreens/smfooter.view.php';

    // Check if the file exists before including it
    if (file_exists($mfooter)) {
        include($mfooter);
    } else {
        echo "Footer file not found: " . $mfooter;
    }
}
/**
 * main nav when logged in
 *
 * @return void
 */
//todo: test this function.
function renderMainNavloggedin()
{
    // Define the path to the footer file
    $mainnavloggedin = '../app/views/publicviews/publicsharable/publicnavfooters/mainnavloggedin.view.php';

    // Check if the file exists before including it
    if (file_exists($mainnavloggedin)) {
        include($mainnavloggedin);
    } else {
        echo "Footer file not found: " . $mainnavloggedin;
    }
}
function renderMainNav()
{
    // Define the path to the footer file
    $mainnav = '../app/views/publicviews/publicsharable/publicnavfooters/mainnav.view.php';

    // Check if the file exists before including it
    if (file_exists($mainnav)) {
        include($mainnav);
    } else {
        echo "Footer file not found: " . $mainnav;
    }
}
function renderblogMainNav()
{
    // Define the path to the footer file
    $blogmainnav = '../app/views/publicviews/publicsharable/publicnavfooters/blognav.view.php';

    // Check if the file exists before including it
    if (file_exists($blogmainnav)) {
        include($blogmainnav);
    } else {
        echo "Footer file not found: " . $blogmainnav;
    }
}

/**
 * all admin rendering functions are defined here
 */

//html admin headermainnav render function

function adminrenderpageHeader()
{
    // Define the path to the footer file
    $adminheadermainnav = '../app/views/adminviews/adminsharablepages/admincombined/adminmainnavhtmlheader.view.php';

    // Check if the file exists before including it
    if (file_exists($adminheadermainnav)) {
        include($adminheadermainnav);
    } else {
        echo "Footer file not found: " . $adminheadermainnav;
    }
}
//html admin htmlfooter render function

function adminrenderHtmlFooter()
{
    // Define the path to the footer file
    $adminfooterPath = '../app/views/adminviews/adminsharablepages/adminhtmlheaderfooter/adminfooter.view.php';

    // Check if the file exists before including it
    if (file_exists($adminfooterPath)) {
        include($adminfooterPath);
    } else {
        echo "Footer file not found: " . $adminfooterPath;
    }
}

//html admin headerhtml render function

function adminrenderHeader()
{
    // Define the path to the footer file
    $adminheaderhtml = '../app/views/adminviews/adminsharablepages/adminhtmlheaderfooter/adminheader.view.php';

    // Check if the file exists before including it
    if (file_exists($adminheaderhtml)) {
        include($adminheaderhtml);
    } else {
        echo "Footer file not found: " . $adminheaderhtml;
    }
}


/**
 * admin smaller screen footer
 *
 * @return void
 */
function adminrendersmfooter()
{
    // Define the path to the footer file
    $adminsmfooter = '../app/views/adminviews/adminsharablepages/adminsmallerscreens/adminsmfooter.view.php';

    // Check if the file exists before including it
    if (file_exists($adminsmfooter)) {
        include($adminsmfooter);
    } else {
        echo "Footer file not found: " . $adminsmfooter;
    }
}
/**
 * main admin nav when logged in
 *
 * @return void
 */
//todo: test this function.
function adminrenderMainNavloggedin()
{
    // Define the path to the footer file
    $adminmainnavloggedin = '../app/views/adminviews/adminsharablepages/adminnavfooters/adminmainnavloggedin.view.php';

    // Check if the file exists before including it
    if (file_exists($adminmainnavloggedin)) {
        include($adminmainnavloggedin);
    } else {
        echo "Footer file not found: " . $adminmainnavloggedin;
    }
}
/**
 * mainnav when not in session
 */
function adminrenderMainNav()
{
    // Define the path to the footer file
    $adminmainnav = '../app/views/adminviews/adminsharablepages/adminnavfooters/adminmainnav.view.php';

    // Check if the file exists before including it
    if (file_exists($adminmainnav)) {
        include($adminmainnav);
    } else {
        echo "Footer file not found: " . $adminmainnav;
    }
}
/**
 * all admin support rendering functions are defined here
 */

//html admin support headermainnav render function

function adminsupportrenderpageHeader()
{
    // Define the path to the footer file
    $adminsupportheadermainnav = '../app/views/adminsupportviews/adminsupportsharablepages/adminsupportcombined/adminsupportmainnavhtmlheader.view.php';

    // Check if the file exists before including it
    if (file_exists($adminsupportheadermainnav)) {
        include($adminsupportheadermainnav);
    } else {
        echo "Footer file not found: " . $adminsupportheadermainnav;
    }
}
//html admin support htmlfooter render function

function adminsupportrenderHtmlFooter()
{
    // Define the path to the footer file
    $adminsupportfooterPath = '../app/views/adminsupportviews/adminsupportsharablepages/adminsupporthtmlheaderfooter/adminsupportfooter.view.php';

    // Check if the file exists before including it
    if (file_exists($adminsupportfooterPath)) {
        include($adminsupportfooterPath);
    } else {
        echo "Footer file not found: " . $adminsupportfooterPath;
    }
}

//html admin support headerhtml render function

function adminsupportrenderHeader()
{
    // Define the path to the footer file
    $adminsupportheaderhtml = '../app/views/adminsupportviews/adminsupportsharablepages/adminsupporthtmlheaderfooter/adminsupportheader.view.php';

    // Check if the file exists before including it
    if (file_exists($adminsupportheaderhtml)) {
        include($adminsupportheaderhtml);
    } else {
        echo "Footer file not found: " . $adminsupportheaderhtml;
    }
}


/**
 * admin support smaller screen footer
 *
 * @return void
 */
function adminsupportrendersmfooter()
{
    // Define the path to the footer file
    $adminsupportsmfooter = '../app/views/adminsupportviews/adminsupportsharablepages/adminsupportsmallerscreens/adminsupportsmfooter.view.php';

    // Check if the file exists before including it
    if (file_exists($adminsupportsmfooter)) {
        include($adminsupportsmfooter);
    } else {
        echo "Footer file not found: " . $adminsupportsmfooter;
    }
}
/**
 * main admin support nav when logged in
 *
 * @return void
 */
//todo: test this function.
function adminsupportrenderMainNavloggedin()
{
    // Define the path to the footer file
    $adminsupportmainnavloggedin = '../app/views/adminsupportviews/adminsupportsharablepages/adminsupportnavfooters/adminsupportmainnavloggedin.view.php';

    // Check if the file exists before including it
    if (file_exists($adminsupportmainnavloggedin)) {
        include($adminsupportmainnavloggedin);
    } else {
        echo "Footer file not found: " . $adminsupportmainnavloggedin;
    }
}
/**
 * mainnav when not in session
 */
function adminsupportrenderMainNav()
{
    // Define the path to the footer file
    $adminsupportmainnav = '../app/views/adminsupportviews/adminsupportsharablepages/adminsupportnavfooters/adminsupportmainnav.view.php';

    // Check if the file exists before including it
    if (file_exists($adminsupportmainnav)) {
        include($adminsupportmainnav);
    } else {
        echo "Footer file not found: " . $adminsupportmainnav;
    }
}
