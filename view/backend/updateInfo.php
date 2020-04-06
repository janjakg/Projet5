<?php $title = "Un titre a été créé" ?>

<?php ob_start(); ?>
<div class="headline">
  <div class="shadow-none m-5 pb-5 ">
    <h1 text-align="center">Mise à jour</h1>
  </div>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <?php if (isset($_GET['idPost'])): ?>
  <p>Un titre a bien été modifié. Merci</p>
  <?php else: ?>
  <p>Un titre a bien été créé. Merci</p>
  <?php endif; ?>

  <a href="index.php?action=createPost">Retour à l'envoi du titre</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>