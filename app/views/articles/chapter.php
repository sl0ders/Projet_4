<!-- Trois variable envoyer sur articles.index :
 articles => lastByChapter() Récupère les dernieres article de la chapter demandée
 chapter => find($_GET['id']) renvoie le chapitre associé a l'aricle
 chapters => all() renvoie tout les element de la table catagories
  -->

<div class="row">
    <div class="col-sm-8">
        <ul>
            <?php
            foreach ($articles as $article): ?>
                <h1><?= $article->title; ?></a></h1>
                <p><em><?= $article->chapter; ?></em></p>
                <p><?= $article->extract; ?> </p>
            <a href="<?= $article->url ?>"><?= $article->nb_com ?> commentaires</a>
            <br>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <?php foreach ($chapters as $chapter): ?>
        <li><?= $chapter->number ?> - <a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></li>
        <?php endforeach; ?>
    </div>
</div>