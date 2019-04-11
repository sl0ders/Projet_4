<!--
index:
une seule variables envoyé sur admin.commentaires.index:
$comments => all() : renvoie tout les elements de la table Commentaires
-->

<h1>Administrer les commentaires</h1>

<Table class="table">
    <thead>
    <tr>
        <td>article_ID</td>
        <td>Auteur</td>
        <td>Contenu</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($comments as $comment) : ?>
        <tr>
            <td><?= $comment->article_id; ?></td>
            <td><?= $comment->auteur; ?></td>
            <td><?= $comment->contenu; ?></td>
        <td>
            <a class="btn btn-primary" href="?p=admin.commentaires.edit&id=<?= $comment->id; ?>">Editer</a>
            <form action="?p=admin.commentaires.delete" method="post" style="display: inline">
                <input type="hidden" name="id" value="<?= $comment->id ?>">
                <button type="submit" class="btn btn-danger">Supprimer
                </button>
            </form>
        </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</Table>