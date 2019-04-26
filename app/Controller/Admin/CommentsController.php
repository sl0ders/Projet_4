<?php


namespace App\Controller\Admin;

use App;
use App\views\HTML\BootstrapForm;

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

    public function comUnreport()
    {
        if ($_GET['id'])
            $this->Comment->updateReportDown($_GET['id']);
        return $this->index();
    }

    public function comReport()
    {
        if ($_GET['id'])
            $this->Comment->updateReportUp($_GET['id']);
        return $this->index();
    }

}
