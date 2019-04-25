<?php


namespace App\Controller\Admin;

use App;
use App\Views\html\BootstrapForm;

class CommentsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Comment');
        $this->loadModel('Article');
    }

    public function index()
    {
        $comments = $this->Comment->last();
        $this->render('admin.comments.index', compact('comments'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->Comment->delete($_POST['id']);

        }
        return $this->index();
    }

}
