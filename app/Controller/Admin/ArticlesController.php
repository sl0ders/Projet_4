<?php

namespace App\Controller\Admin;

use App;
use App\views\HTML\BootstrapForm;

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
        $articles = $this->Article->AllArticlesByDate();
        $chapters = $this->Chapter->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.articles.index', compact('articles', 'chapters', 'form'));
    }

    public function add()
    {
        if (!empty($_POST)) {
            $post = $_POST['publish'];
            if ($post === 'on') {
                $_POST['publish'] = 1;
            } else {
                $_POST['publish'] = 0;
            }
            if ((empty($_POST['number'])) || (empty($_POST['title'])) || (empty($_POST['content']))) {
                echo $this->missCase;
                echo '<script>window.location="index.php?p=admin.articles.add";</script>';

            }
            if ((strlen($_POST['content']) >= 100000) || (strlen($_POST['title']) >= 255)) {
                echo $this->errorSizeMax;
                echo '<script>window.location="index.php?p=admin.articles.add";</script>';

            }
            $numberExist = $this->Article->numberExist($_POST['number']);
            if ($numberExist === false) {
                echo $this->numberExist;
                echo '<script>window.location="index.php?p=admin.articles.add"</script>';
                exit;
            }
            $result = $this->Article->create([
                'title' => htmlspecialchars($_POST['title']),
                'content' => $_POST['content'],
                'chapter_id' => htmlspecialchars($_POST['chapter_id']),
                'publish' => htmlspecialchars($_POST['publish']),
                'number' => htmlspecialchars($_POST['number'])
            ]);
            if ($result) {
                echo '<script>window.location="index.php?p=admin.articles.index";</script>';
                exit;
            }
        }
        $this->loadModel('Chapter');
        $articles = $this->Article->allArticles();
        $chapters = $this->Chapter->extract('id', 'title', 'content');
        $form = new BootstrapForm($_POST);
        $this->render('admin.articles.add', compact('articles', 'chapters', 'form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $post = $_POST['publish'];
            if ($post === 'on') {
                $_POST['publish'] = 1;
            } else {
                $_POST['publish'] = 0;
            }
            if ((empty($_POST['title'])) || (empty($_POST['content']))) {
                echo $this->missCase;
                echo '<script>window.location="index.php?p=admin.articles.edit&id=' .$_GET['id'] . '";</script>';
                exit;
            }
            if ((strlen($_POST['content']) >= 100000) || (strlen($_POST['title']) >= 50)) {
                echo $this->errorSizeMax;
                echo '<script>window.location="index.php?p=admin.articles.edit&id=' .$_GET['id'] . '";</script>';
                exit;
            }

            $result = $this->Article->update($_GET['id'],[
                'title' => htmlspecialchars($_POST['title']),
                'content' => $_POST['content'],
                'chapter_id' => htmlspecialchars($_POST['chapter_id']),
                'publish' => htmlspecialchars($_POST['publish'])
            ]);
            if ($result) {
                echo '<script>window.location="index.php?p=admin.articles.index";</script>';
                exit;
            }
        }
        $this->Article->idExist($_GET['id']);
        $article = $this->Article->find($_GET['id']);
        $articles = $this->Article->allArticles();
        $chaptersXtract = $this->Chapter->extract('id', 'title', 'content');
        $chapters = $this->Chapter->allChapters();
        $form = new BootstrapForm($article);
        $this->render('admin.articles.edit', compact('chapters','articles', 'chaptersXtract', 'form'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->Article->deleteArtCom($_POST['id']);
            return $this->index();
        }
    }

    public function show()
    {
        $this->Article->idExist($_GET['id']);
        $article = $this->Article->findWithChapter($_GET['id']);
        $comments = $this->Comment->getComment($_GET['id']);
        $this->render('admin.articles.show', compact('comments', 'article'));
    }

}