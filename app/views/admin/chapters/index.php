<!--
index:
 une seule variables envoyé sur admin.chapter.index:
 chapters => all() renvoie tout les element de la table catagories
-->
<div class="col-md-5 offset-7">
    <p>
        <a href="?p=admin.articles.index" class="btn btn-warning btn-sm">Gestion des articles -></a>
        <a href="?p=admin.comments.index" class="btn btn-warning btn-sm">Gestion des commentaires -></a>
    </p>
</div>
<h1>Gestion des Chapitres</h1>


<Table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($chapters as $chapter) : ?>
        <tr>
            <td><?= $chapter->id; ?></td>
            <td><?= $chapter->title; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.chapters.edit&id=<?= $chapter->id; ?>">Editer</a>
                <form action="?p=admin.chapters.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $chapter->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</Table>
<a href="?p=admin.chapters.add" class="btn btn-success">Ajouter un chapitre</a>