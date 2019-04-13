<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= App::getInstance()->title; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <div class="col-md-6">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
            </div>
        </div>
        <div class="col-md-6">
            <a href="<?php if (!isset($_SESSION['auth'])) {
                ?>index.php?p=users.login" class=" navbar-brand">Administration</a> <?php }
            else { ?>index.php?p=admin.articles.index" class=" navbar-brand">Administration<a href="?p=users.disconnect"><button class="btn-danger btn-sm">Deconnection</button></a><?php } ?>
        </div>
    </div>
</nav>
<div class="container">
    <div class="starter-template" style="padding-top: 100px;">
        <?= $content; ?>
    </div>
</div>


