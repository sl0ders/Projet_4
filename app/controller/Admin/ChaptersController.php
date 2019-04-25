<?php

namespace App\Controller\Admin;

use App;
use App\Views\html\BootstrapForm;

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
            if (!empty($_POST['number'])) {
                $numberExist = $this->Article->numberExist($_POST['number']);
                if ($numberExist === true) {
                    $result = $this->Chapter->create([
                        'title' => htmlspecialchars($_POST['title']),
                        'number' => htmlspecialchars($_POST['number'])
                    ]);
                    if ($result) {
                        header('Location:index.php?p=admin.chapters.index');
                    }
                } else {
                    echo '<script type="text/javascript">' . 'alert("Erreur : Le numero de l\'article existe deja");' . '</script>';
                }
            }
        }
        $chapter = $this->Chapter->extract('id', 'title');
        $form = new BootstrapForm($chapter);
        $this->render('admin.chapters.edit', compact('form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            if (!empty($_POST['number'])) {
                $numberExist = $this->Article->numberExist($_POST['number']);
                if ($numberExist === true) {
                    $result = $this->Chapter->update($_GET['id'], [
                        'title' => htmlspecialchars($_POST['title']),
                        'number' => htmlspecialchars($_POST['number'])
                    ]);
                    if ($result) {
                        header('Location:index.php?p=admin.chapters.index');
                    }
                } else {
                    echo '<script type="text/javascript">' . 'alert("Erreur : Le numero de l\'article existe deja");' . '</script>';
                }
            }
        }
        $this->Article->idExist($_GET['id']);
        $chapter = $this->Chapter->find($_GET['id']);
        $form = new BootstrapForm($chapter);
        $this->render('admin.chapters.edit', compact('form'));
    }

    public function preview()
    {
        $chapter = $this->Chapter->find($_GET['id']);
        $articles = $this->Article->lastByChapter($_GET['id']);
        $this->render('admin.chapters.preview', compact('chapter', 'articles'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->Chapter->delete($_POST['id']);
        }
        return $this->index();
    }

}