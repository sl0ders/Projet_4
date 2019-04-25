<?php

namespace App\Controller;

use App;
use App\Database\Auth\DBAuth;
use App\Views\html\BootstrapForm;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }

    public function registration()
    {
        if (!empty($_POST)) {
            $result = $this->User->create([
                'username' => htmlspecialchars($_POST['username']),
                'hash' => htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT))
            ]);
            if ($result) {
                header('Location: index?p=users.login');
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.registration', compact('form'));
    }


    public function login()
    {

        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if ($auth->login(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password']))) {
                header('location: index.php?p=admin.articles.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
    }
}