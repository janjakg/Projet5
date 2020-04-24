<?php $title = "Déconnexion"?>

<?php ob_start();?>
<div class="shadow-none m-5 pb-5 bg-light">
  <h1>Nom du site</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <p>Vous êtes maintenat déconnecté !</p>
  <a href="index.php?action=adminLogin">CONNEXION</a>
</section>
<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <a href="index.php?action=listPosts">HOMEPAGE</a>
</section>

<?php $content = ob_get_clean();?>

<?php require 'adminTemplate.php';?>