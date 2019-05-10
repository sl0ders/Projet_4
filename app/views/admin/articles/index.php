<!--
 index:
 une seule variables envoyé sur admin.articles.index:
 articles => last() last renvois la requete qui vas chercher les derniers article et leur chapters
-->
<body id="gestion">
<div class="col-md-5 offset-md-9">
    <a href="?p=admin.chapters.index" class="btn btn-warning btn-sm">Gestion des chapitres</a>
    <a href="?p=admin.comments.index" class="btn btn-warning btn-sm">Gestion des commentaires</a>
</div>
<h1>Gestion des articles</h1>
<?php if (empty($chapters)) { ?>
    <a href="?p=admin.chapters.add" class="btn btn-success">Ajouter un chapitre</a><br><br>
<?php } else { ?>
    <a href="?p=admin.articles.add" class="btn btn-success ">Ajouter un article</a><br><br></div>
<?php } ?>

<div class="responsive-table-line" style="margin:0 auto;max-width:99%;">
    <table cellspacing="0" id="usersTable" class="table-articles table-hover w3-table-all table table-bordered table-sm" width="100%">
        <thead class="text-center">
        <tr>
            <th onclick="w3.sortHTML('#usersTable', '.item', 'td:nth-child(1)')" style="cursor:pointer"><i
                        class="fas fa-arrows-alt-v"></i> Numero de l'article
            </th>
            <th>Titre</th>
            <th onclick="w3.sortHTML('#usersTable', '.item', 'td:nth-child(1)')" style="cursor:pointer"><i
                        class="fas fa-arrows-alt-v"></i> Chapitre n°
            </th>
            <th>Extrait</th>
            <th>Action</th>
            <th onclick="w3.sortHTML('#usersTable', '.item', 'td:nth-child(1)')" style="cursor:pointer"><i
                        class="fas fa-arrows-alt-v"></i> Date création
            </th>
            <th>Nb° commentaires</th>
            <th>Etat de publication</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php foreach ($articles as $article) : ?>
            <tr class="item">
                <td><?= $article->id; ?></td>
                <td>Titre : <?= $article->title; ?></td>
                <td><?= $article->chapterNumber; ?></td>
                <td>Extrait : <?= $article->extractForAdmin; ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="?p=admin.articles.edit&id=<?= $article->id; ?>">Editer</a>
                    <br><br>
                    <form action="?p=admin.articles.delete" method="post">
                        <input type="hidden" name="id" value="<?= $article->id ?>">
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce message?')"
                                class="btn btn-danger btn-sm">Supprimer
                        </button>
                    </form>
                </td>
                <td><?= $article->date_fr; ?></td>
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
</div>


</body>


