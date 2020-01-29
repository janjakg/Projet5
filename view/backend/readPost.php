<?php $title = "Lecture du Post" ?>

<?php ob_start(); ?>
<div class="shadow-none m-5 pb-5 bg-light">
  <h1>Nom du Site</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>
  <h2>Titre</h2>

</section>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <p>
    <strong><?= strip_tags(stripslashes(strtoupper($displayPost['artist']))) ?></strong>
    <br />
  </p>

  <p>
    <?= strip_tags(stripslashes(($displayPost['title'])))?>
    <br />
  </p>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>