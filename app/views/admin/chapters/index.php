<!--
index:
 une seule variables envoyé sur admin.chapter.index:
 chapters => all() renvoie tout les element de la table catagories
-->
<div class="col-md-5 offset-md-9">
        <a href="?p=admin.articles.index" class="btn btn-warning btn-sm">Gestion des articles</a>
        <a href="?p=admin.comments.index" class="btn btn-warning btn-sm">Gestion des commentaires</a>
</div>
<h1>Gestion des Chapitres</h1>
<a href="?p=admin.chapters.add" class="btn btn-success">Ajouter un chapitre</a>
<br>
<br>
<div class="responsive-table-line" style="margin:0 auto;max-width:90%;">
    <table class="table-hover table table-bordered table-condensed table-body-center">
        <thead class="text-center">
        <tr>
            <th>Numero du chapitre</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($chapters as $chapter) : ?>
            <tr>
                <td><?= $chapter->number; ?></td>
                <td><?= $chapter->title; ?></td>
                <td>
                    <a href="?p=admin.chapters.preview&id=<?= $chapter->id; ?>" class="btn btn-success"><i
                                class="far fa-eye"></i></a>
                    <a class="btn btn-primary" href="?p=admin.chapters.edit&id=<?= $chapter->id; ?>">Editer</a>
                    <form action="?p=admin.chapters.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $chapter->id ?>">
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce message?')"
                                class="btn btn-danger">Supprimer
                        </button>

                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </Table>
</div>