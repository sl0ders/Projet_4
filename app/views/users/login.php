<?php
use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;

if (!empty( $_POST )) {
    $auth = new DBAuth( App::getInstance()->getDb() );
    if ($auth->login( $_POST['username'], $_POST['password'] )) {
        header('location: admin.php');
    } else {
        ?>
<div class="alert alert-danger">
    Identifiants Incorrect
</div>

        <?php
    }
}


$form = new BootstrapForm( $_POST );
?>

<form method="post">
    <?= $form->input( 'username', 'Pseudo' ); ?>
    <?= $form->password( 'password', 'Mot de passe'); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>