<!--
index:
une seule variables envoyé sur admin.comments.index:
$comments => all() : renvoie tout les elements de la table comments
-->
<div class="col-md-5 offset-md-9">
        <a href="?p=admin.chapters.index" class="btn btn-warning btn-sm">Gestion des chapitres</a>
        <a href="?p=admin.articles.index" class="btn btn-warning btn-sm">Gestion des articles</a>
</div>

<h1>Gestion des commentaires</h1>
<div class="responsive-table-line" style="margin:0 auto;max-width:90%;">
    <table class="table table-bordered table-condensed table-body-center">
        <thead class="text-center">
        <tr>
            <th>Auteur</th>
            <th>Commmentaires</th>
            <th>Etat du commentaire</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody class="text-center">
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?= $comment->author; ?></td>
                <td><?= $comment->content; ?></td>
                <td>
                    <?php if ($comment->report === '1') { ?>
                        <i class="fas fa-eye-slash" style="color: red;font-size: 2em;"></i>
                    <?php } else { ?>
                        <i class="far fa-eye" style="color: green; font-size: 2em;"></i>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($comment->report === '1') { ?>
                        <form method="post" action="index.php?p=admin.comments.comUnreport&id=<?= $comment->id ?>"
                              style="display: inline">
                            <button type="submit" name="report"
                                    onclick="return confirm('Voulez-vous vraiment lever le signalement de ce commentaire ?')"
                                    class="btn btn-primary">Lever le Signalement
                            </button>
                        </form>
                    <?php } else { ?>
                        <form method="post" action="index.php?p=admin.comments.comReport&id=<?= $comment->id ?>"
                              style="display: inline">
                            <button type="submit" name="report"
                                    onclick="return confirm('Voulez-vous vraiment signaler ce commentaire?')"
                                    class="btn btn-danger">Signaler
                            </button>
                        </form>
                    <?php } ?>
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