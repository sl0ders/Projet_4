<?php

namespace App\Controller\Admin;

use App;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('Post');
        $this->loadTable('Category');
    }

    public function index()
    {
        $posts = $this->Post->last();

        $this->render('admin.posts.index', compact('posts'));
    }


    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'auteur' => $_POST['auteur'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $this->loadTable('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'auteur' => $_POST['auteur'],
                'category_id' => $_POST['category_id']
            ]);

            if ($result) {
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }

}