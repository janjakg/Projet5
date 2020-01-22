<?php $title = "Admin" ?>

<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">ADMIN</h1>
  </div>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <div class="container">
<p>Gérer les commentaires signalés
</p>
  </div>
</section>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <div class="container">
<p>Gestion du contenu : création, mise à jour et suppression
</p>
  </div>
</section>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <div class="container">
<p>Coming soon...
</p>
  </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>