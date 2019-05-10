+<nav aria-label="navigation">
    <ul class="pager">
        <li class="previous"><a href="index.php?p=admin.chapters.index" title="Précédent">Précédent</a></li>
    </ul>
</nav>
<h1><?= $chapter->title; ?></h1>
<br>
<div class="col-md-11 offset-1">
    <?php foreach ($articles as $article) : ?>
        <h2><?= $article->title; ?></h2>
        <p><?= $article->content; ?></p>
        <em><?= $article->date_fr; ?></em>
        <br/> <br/>
    <?php endforeach; ?>
</div>