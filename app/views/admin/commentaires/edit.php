<!--
edit:
deux variables envoyé sur admin.commentaires.edit:
form => Crée un nouvel objet "BootstrapForm" ->input et textarea
-->
<form method="post">
<?= $form->input('auteur', "Auteur du commentaire"); ?>
<?= $form->textarea('contenu', "Entrez votre commentaire") ?>
<button class="btn btn-primary">Sauvegarder</button>
</form>