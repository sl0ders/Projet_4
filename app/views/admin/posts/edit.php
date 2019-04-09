<?php
use Core\HTML\BootstrapForm;

$posTable = App::getInstance()->getTable('Post');
if (!empty($_POST)) {
    $result = $posTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'category_id' => $_POST['category_id']
    ]);

    if ($result) {
header('Location: admin.php');
    }
}
$post = $posTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id' , 'titre');
$form = new BootstrapForm($post);

?>

<form method="post">
    <?= $form->input('titre', "Titre de l'article"); ?>
    <?= $form->textarea('contenu', 'contenu'); ?>
    <?= $form->select('category_id', 'Categorie', $categories); ?>

    <button class="btn btn-primary">Sauvegarder</button>
</form>