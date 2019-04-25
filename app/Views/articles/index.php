<article>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($articles as $article): ?>
                    <h3 class="section-heading">
                        <?= $article->title; ?>
                    </h3>
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
                <?php endforeach; ?>
            </div>

            <div class="col-md-4">
                <?php foreach ($chapters as $chapter): ?>
                    <li><?= $chapter->number ?> - <a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></li>
                <?php endforeach; ?>
            </div>
        </div>
</article>
<br>
<article>
    <h3><b>Les derniers commmentaires</b></h3>
    <br>

    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <h5><?= $comment->author; ?><em> (<?= $comment->date_fr; ?>)</em> <?= $comment->article; ?></h5>
            <p><?= $comment->content; ?></p>
        </div>
        <br>
    <?php endforeach; ?>
</article>
