<?php


namespace App\Controller\Admin;

use App;
use Core\HTML\BootstrapForm;

class CommentairesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('Comment');
        $this->loadTable('Post');
    }

    public function index()
    {
        $comments = $this->Comment->all();
        $this->render('admin.commentaires.index', compact('comments'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $this->Comment->update($_GET['id'], [
                'auteur' => $_POST['auteur'],
                'contenu' => $_POST['contenu']
            ]);
            return $this->index();
        }
        $comments = $this->Comment->find($_GET['id']);
        $form = new BootstrapForm($comments);
        $this->render('admin.commentaires.edit', compact('form'));

    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);

        }
        return $this->index();
    }

}
