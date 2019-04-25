<!-- Trois variable envoyer sur articles.index :
 articles => last() last renvois la requete qui vas chercher les derniers article et leurs chapitres
 comments => all() renvoie tout les elements de la table comments
 chapters => all() renvoie tout les element de la table catagories
 -->
<article>
    <div class="row">
        <div class="col-md-8">
            <?php foreach ($articles

            as $article): ?>
            <h2 class="section-heading">
                <?= $article->title; ?>
            </h2>
            <p>
                <?= $article->extract; ?>
            </p>
            <p>
                <em>
                    Chapitre <b><?= $article->chapterNumber ?> - <?= $article->Chapter; ?></b>
                </em>
            </p>
            <a href="<?= $article->url ?>">
                <em>
                    <?= $article->nb_com ?> Commentaires
                </em>
            </a>
            <br> <br>
            <div class="col-md-4">
                <?php foreach ($chapters as $chapter): ?>
                    <li><?= $chapter->number ?> - <a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></li>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
</article>

<br>
<?php foreach ($comments as $comment): ?>
<h5><?= $comment->author; ?><em> (<?= $comment->date_fr; ?>)</em> <?= $comment->article; ?><em></h5>
<p><?= $comment->content; ?></p>
<br>
<?php endforeach;?>
