<!--
add + edit:
deux variables envoyé sur admin.articles.edit:
form => Crée un nouvel objet "BootstrapForm" -> input , textarea , select
chapters => extract() renvoie l'id et le title de la table catagories
-->
<h1>Modification de votre article</h1>
<form method="post">
    <?= $form->input('title', "Titre de l'article"); ?>
    <?= $form->textarea('content', "Contenu de l'article", "active"); ?>
    <?= $form->select('chapter_id', 'Chapitres', $chapters);?>
    <?= $form->checkbox('Publier', 'publish');?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>


