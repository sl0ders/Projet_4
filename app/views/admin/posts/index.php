<!--
 index:
 une seule variables envoyé sur admin.posts.index:
 posts => last() last renvois la requete qui vas chercher les derniers article et leur categories
-->

<div class="col-sm-12">
<h1>Administrer les Articles</h1>
<p>
    <a href="?p=admin.posts.add" class="btn btn-success">Ajouter</a>
    <a href="?p=admin.categories.index" class="btn btn-warning">Administrer les categories</a>
    <a href="?p=admin.commentaires.index" class="btn btn-warning">Administrer les commentaires</a>
</p>
<Table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Categorie</td>
        <td>Extrait</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->titre; ?></td>
            <td><?= $post->categorie ?></td>
            <td><?= $post->extrait ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id; ?>">Editer</a>
                <form action="?p=admin.posts.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</Table>
</div>