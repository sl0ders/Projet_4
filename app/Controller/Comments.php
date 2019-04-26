<?php


namespace App\Controller;


class Comments extends AppController
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
        $comments = $this->Comment->getComments();
        $this->render('articles.index', compact('comments'));
    }


}