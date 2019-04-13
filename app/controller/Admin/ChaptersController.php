<?php

namespace App\Controller\Admin;

use App;
use Core\HTML\BootstrapForm;

class ChaptersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Chapter');
    }

    public function index()
    {
        $chapters = $this->Chapter->all();
        $this->render('admin.chapters.index', compact('chapters'));
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->Chapter->create([
                'title' => $_POST['title']
            ]);
            return $this->index();
        }
        $chapter = $this->Chapter->extract('id', 'title');
        $form = new BootstrapForm($chapter);
        $this->render('admin.chapters.edit', compact('form'));
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $this->Chapter->update($_GET['id'], [
                'title' => $_POST['title'],
            ]);
            return $this->index();
        }
        $chapter = $this->Chapter->find($_GET['id']);
        $form = new BootstrapForm($chapter);
        $this->render('admin.chapters.edit', compact('form'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->Chapter->delete($_POST['id']);

        }
        return $this->index();
    }

}