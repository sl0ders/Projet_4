<?php

namespace App\Controller\Front;


use App\views\HTML\BootstrapForm;


class ArticlesController extends AppController
{
    protected $errorSizeMax = '<script type="text/javascript">' . 'alert("Erreur : La taille maximum de caractere a etait depassé");' . '</script>';
    protected $errorSizeMin = '<script type="text/javascript">' . 'alert("Erreur : Il vous faut entrer au moin 3 caractere");' . '</script>';

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
        $this->render('front.index', compact('articles', 'comments', 'chapters', 'form'));
    }

    public
    function chapter()
    {
        $chapters = $this->Chapter->all();
        if ($chapters === false) {
            $this->notFound();
        }
        $articles = $this->Article->lastByChapter($_GET['id']);
        $this->render('front.chapter', compact('articles', 'chapters'));
    }

    public function show()
    {
        if (!empty($_POST)) {
            if ((strlen($_POST["content"]) >= 500) || (strlen($_POST["author"]) >= 500)) {
                echo $this->errorSizeMax;
            }
            if ((strlen($_POST["content"]) <= 0) || (strlen($_POST["author"]) <= 3)) {
                echo $this->errorSizeMin;
            } else {
                $result = $this->Comment->create([
                    'article_id' => htmlspecialchars($_GET['id']),
                    'author' => htmlspecialchars($_POST['author']),
                    'content' => htmlspecialchars($_POST['content'])
                ]);

                if ($result) {
                    echo '<script type="text/javascript">window.location="index.php?p=articles.index";</script>';
                    exit;
                }
            }
        }
        $this->Article->idExist($_GET['id']);
        $article = $this->Article->findWithChapter($_GET['id']);
        $comments = $this->Comment->getComment($_GET['id']);
        $form = new BootstrapForm($_POST);
        $this->render('front.show', compact('comments', 'article', 'form'));

    }

    public function comReport()
    {
        if ($_GET['id'])
            $this->Comment->updateReportUp($_GET['id']);
        return $this->index();
    }

}