<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;


class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('Post');//PostTable
        $this->loadTable('Category');//CategoryTable
        $this->loadTable('Comment');//CommentTable qui extends de Table
    }

    public function index()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $comments = $this->Comment->all();//fait appelle a CommentTable qui extends de Table qui contient la methode all

        $this->render('posts.index', compact('posts', 'comments', 'categories'));
    }

    public function category()
    {
        $category = $this->Category->find($_GET['id']);
        if ($category === false) {
            $this->notFound();
        }
        $posts = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();

        $this->render('posts.category', compact('posts', 'categories', 'category'));
    }

    public function show()
    {
        if (!empty($_POST)) {
            $this->Comment->create([
                'auteur' => $_POST['auteur'],
                'contenu' => $_POST['contenu'],
                'article_id' => $_GET['id']
            ]);
        }
        $post = $this->Post->findWithCategory($_GET['id']);
        $comment = $this->Comment->getComment($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('posts.show', compact('comment', 'post', 'form'));
    }
}