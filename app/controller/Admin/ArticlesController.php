<?php

namespace App\Controller\Admin;

use App;
use Core\HTML\BootstrapForm;

class ArticlesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
        $this->loadModel('Chapter');
        $this->loadmodel('Comment');
    }

    public function index()
    {
        $articles = $this->Article->allArticle();

        $this->render('admin.articles.index', compact('articles'));
    }


    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Article->create([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'chapter_id' => $_POST['chapter_id']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $this->loadModel('Chapter');
        $chapters = $this->Chapter->extract('id', 'title', 'content');
        $form = new BootstrapForm($_POST);
        $this->render('admin.articles.edit', compact('chapters', 'form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Article->update($_GET['id'], [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'chapter_id' => $_POST['chapter_id']
            ]);

            if ($result) {
                return $this->index();
            }
        }
        $article = $this->Article->find($_GET['id']);
        $chapters = $this->Chapter->extract('id', 'title');
        $form = new BootstrapForm($article);
        $this->render('admin.articles.edit', compact('chapters', 'form'));

    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->Article->delete($_POST['id']);
            return $this->index();
        }
    }

    public function show()
    {
        $article = $this->Article->findWithChapter($_GET['id']);
        $comments = $this->Comment->getComment($_GET['id']);
        $this->render('admin.articles.show', compact('comments', 'article'));
    }

}