<?php
use Core\HTML\BootstrapForm;

$categoryTable = App::getInstance()->getTable('Category');
if (!empty($_POST)) {
    $result = $categoryTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
    ]);

    if ($result) {
        header('Location:admin.php?p=categories.index');
    }
}
$category = $categoryTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id' , 'titre');
$form = new BootstrapForm($category);

?>

<form method="post">
    <?= $form->input('titre', "Titre de la category"); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>