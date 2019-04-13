<!--
 index:
 une seule variables envoyé sur admin.articles.index:
 articles => last() last renvois la requete qui vas chercher les derniers article et leur chapters
-->
<div class="col-md-5 offset-7">
<p>
    <a href="?p=admin.chapters.index" class="btn btn-warning btn-sm">Gestion des chapters -></a>
    <a href="?p=admin.comments.index" class="btn btn-warning btn-sm">Gestion des commentaires -></a>
</p>
</div>
<div class="col-sm-12">
<h1>Gestion des articles</h1>

<Table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Chapitre</td>
        <td>Extrait</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($articles as $article) : ?>
        <tr>
            <td><?= $article->id; ?></td>
            <td><?= $article->title; ?></td>
            <td><?= $article->Chapter ?></td>
            <td><?= $article->extraitForAdmin ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.articles.edit&id=<?= $article->id; ?>">Editer</a>
                <form action="?p=admin.articles.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $article->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</Table>
    <a href="?p=admin.articles.add" class="btn btn-success">Ajouter un article</a>
</div>