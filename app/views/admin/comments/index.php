<!--
index:
une seule variables envoyé sur admin.comments.index:
$comments => all() : renvoie tout les elements de la table comments
-->
<div class="col-md-5 offset-7">
    <p>
        <a href="?p=admin.chapters.index" class="btn btn-warning btn-sm">Gestion des chapitres</a>
        <a href="?p=admin.articles.index" class="btn btn-warning btn-sm">Gestion des articles</a>
    </p>
</div>

<h1>Gestion des commentaires</h1>
<div class="responsive-table-line" style="margin:0 auto;max-width:90%;">
    <table class="table table-bordered table-condensed table-body-center">
        <thead>
        <tr>
            <td>Auteur</td>
            <td>Commmentaires</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?= $comment->author; ?></td>
                <td><?= $comment->content; ?></td>
                <td>
                    <form action="?p=admin.comments.delete" method="post" style="display: inline">
                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce message?')"
                                class="btn btn-danger">Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
