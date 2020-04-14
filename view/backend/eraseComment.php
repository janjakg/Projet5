<?php $title = "Commentaire supprimé" ?>

<?php ob_start(); ?>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <p>Ce commentaire a bien été supprimé. Merci</p>
  <a href="index.php?action=adminIndex">Retour aux commentaires signalés</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>