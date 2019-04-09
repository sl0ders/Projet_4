<?php

use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}
//Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if(!$auth->logged()){
    $app->forbidden();
}

ob_start();
if ($page === 'home') {
    require ROOT . '/pages/admin/posts/index.php';
} elseif ($page === 'posts.edit') {
    require ROOT . '/pages/admin/posts/edit.php';
} elseif ($page === '/posts.show') {
    require ROOT . '/pages/admin/posts/show.php';
}
$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';
/*
elseif ($p === 'article'){
    require '../pages/show.php';
} elseif ($p === 'categorie'){
    require '../pages/category.php';
}

require '../pages/templates/default.php';


$app = App\App::getInstance();
$app->title = "titre de test";*/

