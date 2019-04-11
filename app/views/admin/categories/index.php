<!--
index:
 une seule variables envoyé sur admin.category.index:
 categories => all() renvoie tout les element de la table catagories
-->

<h1>Administrer les Categories</h1>
<p>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
</p>
<Table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?= $category->id; ?></td>
            <td><?= $category->titre; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id; ?>">Editer</a>
                <form action="?p=admin.categories.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $category->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer
                    </button>

                </form>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</Table>