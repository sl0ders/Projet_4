<!--
login:
deux variables envoyé sur users.login:
$form => Crée un nouvel objet "BootstrapForm" -> input , password
$errors => false ou true, si le login est bon = true et renvoie sur admin.articles.index, si le login et faux = message d'erreur
-->
<?php
if ($errors) : ?>
<div class="alert alert-danger">
    Identifiants Incorrects
</div>
<?php endif; ?>

<form method="post">
    <?= $form->input( 'username', 'Pseudo' ); ?>
    <?= $form->password( 'password', 'Mot de passe'); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>