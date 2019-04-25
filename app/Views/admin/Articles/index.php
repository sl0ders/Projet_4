<!--
 index:
 une seule variables envoyé sur admin.articles.index:
 articles => last() last renvois la requete qui vas chercher les derniers article et leur chapters
-->
<div class="col-md-5 offset-md-9">
    <a href="?p=admin.chapters.index" class="btn btn-warning btn-sm">Gestion des chapitres</a>
    <a href="?p=admin.comments.index" class="btn btn-warning btn-sm">Gestion des commentaires</a>
</div>
<h1>Gestion des articles</h1>
    <?php if (empty($chapters)){ ?>
        <a href="?p=admin.chapters.add" class="btn btn-success">Ajouter un chapitre</a><br><br>
    <?php } else { ?>
    <a href="?p=admin.articles.add" class="btn btn-success ">Ajouter un article</a><br><br></div>
<?php } ?>

<div class="responsive-table-line" style="margin:0 auto;max-width:95%;">
    <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="th-sm">Numero de l'article</th>
            <th class="th-sm">Titre</th>
            <th class="th-sm">Chapitre n°</th>
            <th class="th-sm">Extrait</th>
            <th class="th-sm">Action</th>
            <th class="th-sm">Date Modif</th>
            <th class="th-sm">Nb° commentaires</th>
            <th class="th-sm">Etat de publication</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td>N° : <?= $article->number; ?></td>
                <td>Titre : <?= $article->title; ?></td>
                <td>Chapitre : <?= $article->chapterNumber; ?></td>
                <td>Extrait : <?= $article->extractForAdmin; ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?p=admin.articles.edit&id=<?= $article->id; ?>">Editer</a>
                    <form action="?p=admin.articles.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $article->id ?>">
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce message?')"
                                class="btn btn-danger btn-sm">Supprimer
                        </button>
                    </form>
                </td>
                <td>le <?= $article->date_fr; ?></td>
                <td>
                    <a href="index.php?p=admin.comments.index">
                        <?= $article->nb_com ?>
                        commentaire<?php echo ($article->nb_com > 1) ? "s" : ""; ?>
                    </a>
                </td>
                <td><?php if ($article->publish == '1') {
                        echo 'publier';
                    } else {
                        echo 'non publier';
                    } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </Table>
<h3>chapitre</h3>
<?php foreach ($chapters as $chapter) : ?>
    <ul>
        <li><?= $chapter->number ?> - <?= $chapter->title ?></li>
    </ul>
<?php endforeach; ?>


