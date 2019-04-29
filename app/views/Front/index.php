
<div class="col-md-12 d-md-inline text-center">
    <h2>Les chapitres</h2>
    <?php foreach ($chapters as $chapter): ?>
        <li><?= $chapter->number ?> - <a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></li>
    <?php endforeach; ?>
</div>
<article>
    <div class="row">
        <div class="col-md-12 text-center">
            <?php foreach ($articles as $article): ?>
                <div class="article">
                    <h3 class="section-heading"><?= $article->title; ?></h3>
                    <p><?= $article->extract; ?></p>
                    <br>
                    <p>
                        <em>Chapitre <b><?= $article->chapterNumber ?> - <?= $article->Chapter; ?></b></em>
                    </p>
                    <br>
                    <a href="<?= $article->url ?>">
                        <em><?= $article->nb_com ?> Commentaire<?php if($article->nb_com > 1){echo's';}?></em>
                    </a>
                    <div style="text-align: right; margin-right: 20px"><em><?= $article->date_fr ?></em></div>
                </div>
                <br> <br>

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

        </div>
        <br>
    <?php endforeach; ?>
</article>