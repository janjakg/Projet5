<?php 

$title = "Decouvertes"; 
?>

<?php ob_start();?>

<div class="banner">

  <div class="titre">
    <h1 class=" m-5 pb-5">Tracklist</h1>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-3">

  <?php while ($data = $posts->fetch()):?>

  <div class="col mb-4">
    <div class="card">
      <img src="public/img/hiphop.jpg" class="card-img-top" alt="hiphop_image">
      <div class="card-body">
        <h5 class="card-title"><?= strip_tags(stripslashes($data['artist'])) ?></h5>
        <p class="card-text"><?= nl2br(strip_tags(stripslashes(substr($data['title'],0,200)))) ?></p>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">voir plus</a>
      </div>
    </div>
  </div>

  <?php endwhile;?>

</div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>