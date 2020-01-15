<?php 

$title = "Decouvertes"; 
?>

<?php ob_start();?>

<div class="banner">

  <div class="titre">
    <h1 class=" m-5 pb-5">TRACKLIST </h1>
  </div>
</div>

<?php while ($data = $posts->fetch()):?>

<div class="news">
  <div class="shadow p-3 mb-5 bg-white rounded">
    <h3>
      <em><?= strip_tags(stripslashes($data['artist'])) ?></em>     
    </h3>
    <p>"<?= nl2br(strip_tags(stripslashes(substr($data['title'],0,200)))) ?>"</p>
    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">voir plus</a>
    <p>envoyé le <?= nl2br(strip_tags(stripslashes($data['creation_date_fr']))) ?></p>
  </div>
</div>

<?php endwhile;?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>