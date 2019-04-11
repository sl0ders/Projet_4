<!--
add + edit:
une seule variable envoyé sur admin.category.edit:
form => Crée un nouvel objet "BootstrapForm" -> input
categories => extract() renvoie l'id et le titre de la table catagories
-->

<form method="post">
    <?= $form->input('titre', "Titre de la category"); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>