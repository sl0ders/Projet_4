
<!-- Trois variable envoyer sur articles.index :
 articles => last() last renvois la requete qui vas chercher les derniers article et leurs chapitres
 comments => all() renvoie tout les elements de la table comments
 chapters => all() renvoie tout les element de la table catagories
 -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($articles as $article): ?>
                    <h2 class="section-heading"><h2> <?= $article->title; ?></h2></h2>
                    <p><?= $article->extrait; ?></p>
                    <p><em>cat : <b><?= $article->Chapter; ?></b></em></p>
                    <a href="<?= $article->url ?>">
                        <button class="btn btn-primary">Commenter</button>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="col-md-4">
                <?php foreach ($chapters as $chapter): ?>
                    <li><a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></li>
                <?php endforeach; ?>
            </div>
        </div>
</article>
<br>
<article>
    <h3><b>Les derniers commmentaires</b></h3>
    <?php foreach ($comments as $comment): ?>
        <h5><?= $comment->author; ?><em> (<?= $comment->date; ?>)</em> <?= $comment->article; ?><em></h5>
        <p><?= $comment->content; ?></p>
    <?php endforeach; ?>
    <br>
</article>



