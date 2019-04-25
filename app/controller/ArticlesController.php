<?php

namespace App\Controller;


use App\views\HTML\BootstrapForm;


class articlesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');//articleTable
        $this->loadModel('Chapter');//ChapterModel
        $this->loadModel('Comment');//CommentModel qui extends de Model
    }

    public function index()
    {
        $articles = $this->Article->checked();
        $chapters = $this->Chapter->all();
        $comments = $this->Comment->last();//fait appelle a CommentModel qui extends de Model qui contient la methode all
        $form = new BootstrapForm($_POST);
        $this->render('articles.index', compact('articles', 'comments', 'chapters','form'));
    }

    public function chapter()
    {
        $chapters = $this->Chapter->all();
        if ($chapters === false) {
            $this->notFound();
        }
        $articles = $this->Article->lastByChapter($_GET['id']);
        $this->render('articles.chapter', compact('articles', 'chapters'));
    }

    public function show()
    {
        if (!empty($_POST)) {
            $result = $this->Comment->create([
                'article_id' => htmlspecialchars($_GET['id']),
                'author' => htmlspecialchars($_POST['author']),
                'content' => $_POST['content']
            ]);
            if($result){
                header('Location:index.php?p=articles.index');
            }
        }
            $this->Article->idExist($_GET['id']);
            $article = $this->Article->findWithChapter($_GET['id']);
            $comments = $this->Comment->getComment($_GET['id']);
            $form = new BootstrapForm($_POST);
            $this->render('articles.show', compact('comments', 'article', 'form'));
    }
}