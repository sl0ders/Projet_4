<!-- Trois variable envoyer sur posts.index :
 $commentaire => getComment() renvois les commentaires correspondant au articles en ce servant de leur id
 $post => findWithCategory() renvoie tout les elements de la table Articles associé a leur categorie via l'id
 $form => creer un nouvel objet "formulaire bootstrap" ce servant de $_POST pour faire circuler les infos
 -->

<h1><?= $post->titre; ?></h1>
<p><em><?= $post->categorie; ?></em></p>
<p><?= $post->contenu; ?></p>
<p><em> <?= $post->auteur; ?></em></p>

<?php foreach ($comment as $comment): ?>
    <h3>Commentaire(s)</h3>
    <h6><?= $comment->auteur; ?> <em><?= $comment->date; ?></em></h6>
    <p><?= $comment->contenu; ?></p>
<?php endforeach; ?>

<form method="post">
    <?= $form->input('auteur', "Auteur du commentaire"); ?>
    <?= $form->textarea('contenu', "Entrez votre commentaire") ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>





