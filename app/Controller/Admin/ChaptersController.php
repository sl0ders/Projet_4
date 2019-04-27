<?php

namespace App\Controller\Admin;

use App;
use App\views\HTML\BootstrapForm;

class ChaptersController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Chapter');
        $this->loadModel('Article');
    }

    public function index()
    {
        $chapters = $this->Chapter->all();
        $this->render('admin.chapters.index', compact('chapters'));
    }

    public function add()
    {
        if (!empty($_POST)) {
            if ((empty($_POST['number'])) || (empty($_POST['title']))) {
                echo $this->missCase;
                echo '<script>window.location="index.php?p=admin.chapters.add";</script>';

            }
            if ((strlen($_POST['title']) >= 40)) {
                echo $this->errorSizeMax;
                echo '<script>window.location="index.php?p=admin.chapters.add";</script>';
            }
            $numberExist = $this->Chapter->numberExist($_POST['number']);
            if ($numberExist === false) {
                echo $this->numberExist;
                echo '<script>window.location="index.php?p=admin.chapters.add";</script>';
            }
            $result = $this->Chapter->create([
                'title' => htmlspecialchars($_POST['title']),
                'number' => htmlspecialchars($_POST['number'])
            ]);
            if ($result) {
                echo '<script>window.location="index.php?p=admin.chapters.index";</script>';
            }
        }

        $chapter = $this->Chapter->extract('id', 'title');
        $form = new BootstrapForm($chapter);
        $this->render('admin.chapters.edit', compact('form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            if ((empty($_POST['number'])) || (empty($_POST['title']))) {
                echo $this->missCase;
                echo '<script>window.location="index.php?p=admin.chapters.edit&id=' .$_GET['id'] . '";</script>';
                exit;
            }
            if ((strlen($_POST['title']) >= 40)) {
                echo $this->errorSizeMax;
                echo '<script>window.location="index.php?p=admin.chapters.edit&id=' .$_GET['id'] . '";</script>';
                exit;
            }
            $numberExist = $this->Chapter->numberExist($_POST['number']);
            if ($numberExist === false) {
                echo $this->numberExist;
                echo '<script>window.location="index.php?p=admin.chapters.edit&id=' .$_GET['id'] . '";</script>';
                exit;
            }
            $result = $this->Chapter->update($_GET['id'], [
                'title' => htmlspecialchars($_POST['title']),
                'number' => htmlspecialchars($_POST['number'])
            ]);
            if ($result) {
                echo '<script>window.location="index.php?p=admin.chapters.index";</script>';
            }
        }
        $this->Chapter->idExist($_GET['id']);
        $chapter = $this->Chapter->find($_GET['id']);
        $chapters = $this->Chapter->allChapters();
        $chapterss = $this->Chapter->extract('id', 'title');
        $form = new BootstrapForm($chapter);
        $this->render('admin.chapters.edit', compact('chapters', 'chapterss', 'form'));
    }

    public
    function preview()
    {
        $chapter = $this->Chapter->find($_GET['id']);
        $articles = $this->Article->lastByChapter($_GET['id']);
        $this->render('admin.chapters.preview', compact('chapter', 'articles'));
    }

    public
    function delete()
    {
        if (!empty($_POST)) {
            $this->Chapter->delete($_POST['id']);
        }
        return $this->index();
    }

}