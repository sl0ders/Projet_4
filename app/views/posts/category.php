<!-- Trois variable envoyer sur posts.index :
 posts => lastByCategory() Récupère les dernieres article de la category demandée
 category => find($_GET['id']) renvoie la categorie associé a l'aricle
 categories => all() renvoie tout les element de la table catagories
  -->

<div class="row">
    <div class="col-sm-8">
        <ul>
            <?php
            foreach ($posts as $post): ?>
                <h1><a href="<?= $post->url ?>"> <?= $post->titre; ?></a></h1>
                <p><em><?= $post->categorie; ?></em></p>
                <p><?= $post->extrait; ?> </p>
                <p><em> <?= $post->auteur; ?></em></p>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <?php foreach ($categories as $categorie): ?>
        <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
        <?php endforeach; ?>

    </div>
</div>