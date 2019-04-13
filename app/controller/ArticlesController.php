<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;


class articlesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('article');//articleTable
        $this->loadModel('Chapter');//ChapterModel
        $this->loadModel('Comment');//CommentModel qui extends de Model
    }

    public function index()
    {
        $articles = $this->article->lastArticle();
        $chapters = $this->Chapter->all();
        $comments = $this->Comment->last();//fait appelle a CommentModel qui extends de Model qui contient la methode all

        $this->render('articles.index', compact('articles', 'comments', 'chapters'));
    }

    public function chapter()
    {
        $category = $this->Chapter->find($_GET['id']);
        if ($category === false) {
            $this->notFound();
        }
        $articles = $this->article->lastByChapter($_GET['id']);
        $chapters = $this->Chapter->all();

        $this->render('articles.chapter', compact('articles', 'chapters'));
    }

    public function show()
    {
        if (!empty($_POST)) {
            $this->Comment->create([
                'article_id' => $_GET['id'],
                'author' => $_POST['author'],
                'content' => $_POST['content']
            ]);
        }
        $article = $this->article->findWithChapter($_GET['id']);
        $comments = $this->Comment->getComment($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('articles.show', compact('comments', 'article', 'form'));
    }
}