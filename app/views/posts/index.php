<!-- Trois variable envoyer sur posts.index :
 posts => last() last renvois la requete qui vas chercher les derniers article et leur categories
 comments => all() renvoie tout les elements de la table Commentaires
 categories => all() renvoie tout les element de la table catagories
 -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($posts as $post): ?>
                    <h2 class="section-heading"><h2> <?= $post->titre; ?></h2></h2>
                    <p><?= $post->contenu; ?></p>
                    <p>Placeholder text by <em> <?= $post->auteur; ?></em></p>
                    <p><em>cat:<?= $post->categorie; ?></em></p>
                    <a href="<?= $post->url ?>">
                        <button href="index.php?p=posts.commentaires.edit" class="btn btn-primary">Commenter</button>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="col-md-4">

                <?php foreach ($categories as $categorie): ?>
                    <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
                <?php endforeach; ?>
            </div>
        </div>
</article>
<br>
<article>
<h3><b>Les derniers commmentaires</b></h3>
<?php foreach ($comments as $comment): ?>
    <h5><?= $comment->auteur; ?><em> (<?= $comment->date; ?>)</em></h5>
    <p><?= $comment->contenu; ?></p>
<?php endforeach; ?>
<br>
</article>



