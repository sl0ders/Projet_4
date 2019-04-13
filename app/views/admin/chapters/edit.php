<!--
add + edit:
une seule variable envoyé sur admin.chapter.edit:
form => Crée un nouvel objet "BootstrapForm" -> input
chapters => extract() renvoie l'id et le title de la table catagories
-->

<form method="post">
    <?= $form->input('title', "Titre de du chapitre"); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>