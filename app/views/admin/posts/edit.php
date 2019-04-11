<!--
add + edit:
deux variables envoyé sur admin.posts.edit:
form => Crée un nouvel objet "BootstrapForm" -> input , textarea , select
categories => extract() renvoie l'id et le titre de la table catagories
-->

<form method="post">
    <?= $form->input('titre', "Titre de l'article"); ?>
    <?= $form->input('auteur', "auteur de l'article"); ?>
    <?= $form->textarea('contenu', 'contenu'); ?>
    <?= $form->select('category_id', 'Categorie', $categories); ?>

    <button class="btn btn-primary">Sauvegarder</button>
</form>