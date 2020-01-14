<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="shadow-none m-5 pb-5 bg-azure">
  <div class="titre2">
    <h1 class="text-center">Track</h1>
  </div>
</div>
<!--Liste des posts -->
<section class="news">

  <div class="shadow-lg p-3 mb-5 bg-white rounded">

    <h2><?= strip_tags(stripslashes($post['title'])) ?></h2>
    <p>
      <?= strip_tags(stripslashes($post['artist'])) ?>
    </p>
    <div id="date">
      <em>le <?= $post['creation_date_fr'] ?></em>
    </div>
  </div>
  <a href="index.php">retour à l'accueil</a>
</section>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>