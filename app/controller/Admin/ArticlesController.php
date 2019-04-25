<?php

namespace App\Controller\Admin;

use App;
use App\Views\html\BootstrapForm;

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
        $articles = $this->Article->countCommentsForArticle();
        $chapters = $this->Chapter->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.articles.index', compact('articles', 'chapters', 'form'));
    }

    public function add()
    {
        if (!empty($_POST)) {
            if (!empty($_POST['number'])) {
                if (strlen($_POST['content']) <= 1000) {
                    $numberExist = $this->Article->numberExist($_POST['number']);
                    if ($numberExist === true) {
                        $post = $_POST['publish'];
                        if ($post === 'on') {
                            $_POST['publish'] = 1;
                        } else {
                            $_POST['publish'] = 0;
                        }
                        $result =
                            $this->Article->create([
                                'title' => htmlspecialchars($_POST['title']),
                                'content' => $_POST['content'],
                                'chapter_id' => htmlspecialchars($_POST['chapter_id']),
                                'publish' => htmlspecialchars($_POST['publish']),
                                'number' => htmlspecialchars($_POST['number'])
                            ]);
                        if ($result) {
                            header('Location:index.php?p=admin.articles.index');
                        }
                    } else {
                        echo '<script type="text/javascript">' . 'alert("Erreur : Le numero de l\'article existe deja");' . '</script>';
                    }
                }
                echo 'trop de caracteres dans le contenu de votre article';
            }
        }
        $this->loadModel('Chapter');
        $chapters = $this->Chapter->extract('id', 'title', 'content');
        $form = new BootstrapForm($_POST);
        $this->render('admin.articles.add', compact('chapters', 'form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Article->update($_GET['id'], [
                'title' => htmlspecialchars($_POST['title']),
                'content' => $_POST['content'],
                'chapter_id' => htmlspecialchars($_POST['chapter_id']),
                'publish' => htmlspecialchars($_POST['publish']),
                'number' => htmlspecialchars($_POST['number'])
            ]);
            if ($result) {
                header('Location:index.php?p=admin.articles.index');
            }
        }
        $this->Article->idExist($_GET['id']);
        $article = $this->Article->find($_GET['id']);
        $chapters = $this->Chapter->extract('id', 'title');
        $form = new BootstrapForm($article);
        $this->render('admin.articles.edit', compact('chapters', 'form'));
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