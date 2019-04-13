<!-- Trois variable envoyer sur articles.index :
 articles => lastByCategory() Récupère les dernieres article de la chapter demandée
 chapter => find($_GET['id']) renvoie le chapitre associé a l'aricle
 chapters => all() renvoie tout les element de la table catagories
  -->

<div class="row">
    <div class="col-sm-8">
        <ul>
            <?php
            foreach ($articles as $article): ?>
                <h1><a href="<?= $article->url ?>"> <?= $article->title; ?></a></h1>
                <p><em><?= $article->Chapter; ?></em></p>
                <p><?= $article->extrait; ?> </p>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <?php foreach ($chapters as $chapter): ?>
        <li><a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></li>
        <?php endforeach; ?>

    </div>
</div>