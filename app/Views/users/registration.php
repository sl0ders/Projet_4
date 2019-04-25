<form method="post">
    <?= $form->input('username', "Entrez un pseudo"); ?>
    <?= $form->password('password', "Entrez un mot de passe"); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>