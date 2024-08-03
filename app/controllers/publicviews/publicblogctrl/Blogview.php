<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');

use app\core\Controller;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;
use app\models\Pager;
use app\models\Session;
use app\models\Request;
use app\models\Blogcomments;
use app\models\Blogcommentsnotloggedin;
use app\models\Blogloggedinreplies;
use app\models\Blogloggedout;
use app\models\User;

class Blogview extends Controller
{
    public function index($id = null)
    {
        $data['title'] = "View blog";
        $ses = new Session();
        $req = new Request();
        // Instantiate Blogcomments model
        $blogCommentsModelreplies = new Blogloggedinreplies();
        $data['commentreply'] = $blogCommentsModelreplies->findAllcommentreplies();
        $usercomentnotloggedinreplies = new Blogloggedout();
        $data['commentreplynotlogged'] = $usercomentnotloggedinreplies->findAllcommentreplies();
        $blogCommentsModel = new Blogcomments();
        $usercomentnotloggedin = new Blogcommentsnotloggedin();
        $data['comment'] = $blogCommentsModel->wherecomment(['postID' => $id]);
        $data['commentnotlogged'] = $usercomentnotloggedin->wherecomment(['postID' => $id]);

        $userpost = new Adminpostsmodel();

        $data['rowpost'] = $userpost->first(['postID' => $id]);

        // Pager setup
        $limit = 10;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;

        $adminpostdetail = new User();
        $data['rowcreatorusers'] = $adminpostdetail->findAllusers();
        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();

        
        if ($req->posted()) {
            $files = $req->files();
            $postid = $id;
            
            $postData = $req->POST();
            $commentid =$req->POST("commentID");
            show($postData);
            show($commentid);
            $formType = $postData['form_type']; // Get the form type
        
            if ($ses->isLoggedIn()) {
                $userID = $ses->user("user_id");
                switch ($formType) {
                    case 'add_blog_comment':
                        $blogCommentsModel->addblogcomment($postData, $files, $userID, $postid);
                        break;
                    case 'add_blog_comment_reply':
                        $blogCommentsModelreplies->addblogcommentreply($postData, $commentid, $files, $userID, $postid);
                        break;
                    case 'add_blog_comment_reply_comment_from_notlogged':
                        $usercomentnotloggedinreplies->addblogcommentnotloggedinreply($data,$commentid, $files, $userID, $postid);
                        break;
                }
            } else {
                $userID = $ses->getSessionID();
                switch ($formType) {
                    case 'add_blog_comment_not_logged_in':
                        $usercomentnotloggedin->addblogcommentnotloggedin($postData, $files, $userID, $postid);
                        break;
                    case 'add_blog_comment_reply_not_logged_in':
                        $usercomentnotloggedinreplies->addblogcommentnotloggedinreply($data,$commentid, $files, $userID, $postid);
                        break;
                    case 'add_blog_comment_reply_not_logged_in_fromloggeduser':
                        $blogCommentsModelreplies->addblogcommentreply($postData, $commentid, $files, $userID, $postid);
                        break;
                    
                        
                }
            }
        }
        

        $data["pager"] = $pager;
        $data["user"] = $blogCommentsModel;
        $data["usernotloggedin"] = $usercomentnotloggedin;
        // show($data);
        $this->view('publicviews/publicblog/blogviewpage', $data);
    }
}
