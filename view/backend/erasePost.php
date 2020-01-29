<?php $title = "Post supprimé" ?>

<?php ob_start(); ?>
<div class="shadow-none m-5 pb-5 bg-light">
  <h1>Nom du Site</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <p>Ce post a bien été supprimé. Merci</p>
  <a href="index.php?action=adminCrud">Retour à la liste des posts</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>