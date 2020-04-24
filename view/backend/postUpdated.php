<?php $title = "Post modifié"?>

<?php ob_start();?>
<div class="shadow-none m-5 pb-5 ">
  <h1>MISE A JOUR</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <p>Ce titre a bien été mis à jour. Merci</p>
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>
</section>

<?php $content = ob_get_clean();?>

<?php require 'adminTemplate.php';?>