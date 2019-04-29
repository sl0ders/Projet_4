<!-- Trois variable envoyer sur articles.index :
 $commentaire => getComment() renvois les comments correspondant au articles en ce servant de leur id
 $article => findWithCategory() renvoie tout les elements de la table Articles associé a leur chapitre via l'id
 $form => creer un nouvel objet "formulaire bootstrap" ce servant de $_POST pour faire circuler les infos
 -->

<h1><?= $article->title; ?></h1>
<p><em><?= $article->Chapter; ?></em></p>
<p><?= $article->content; ?></p>
<br>
<h4>Commentaire(s)</h4>
<br/>
<?php foreach ($comments as $comment): ?>
    <h5><em><?= $comment->author; ?> le <?= $comment->date_fr; ?></em></h5>
    <?php if ($comment->report >= "1") {
        echo ' <p style="color:red">Le commentaire a etait signalé</p>';
    } else { ?>
        <p><?= $comment->content; ?></p>
        <form method="post" action="index.php?p=Front.articles.comReport&id=<?= $comment->id ?>">
            <button type="submit" name="report"
                    onclick="return confirm('Voulez-vous vraiment signaler ce commentaire?')"
                    class="btn btn-danger btn-sm">Signaler
            </button>
        </form>
    <?php } ?>
        <br>
        <?php endforeach; ?>
        <br>
        <form method="post">
            <?= $form->input('author', "Auteur du commentaire"); ?>
            <?= $form->textarea('content', "Entrez votre commentaire", "disable") ?>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>





