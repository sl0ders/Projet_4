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
<h6><em><?= $comment->author; ?></em><em> le <?= $comment->date_fr; ?>
        <p><?= $comment->content; ?></p>

        <?php endforeach; ?>

