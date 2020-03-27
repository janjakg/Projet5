<?php 

$title = "Decouvertes"; 
?>

<?php ob_start();?>

<div class="banner">

  <div class="jumbotron ">
    <div class="container">
      <h1 class="display-4 ">Tracklist...</h1>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3">

    <?php while ($data = $posts->fetch()):?>

    <div class="col mb-5 pb-5">
      <div class="card">
        <img src="<?= strip_tags(stripslashes($data['imageAlbum'])) ?>" , class="card-img-top" alt="album_cover">
        <div class="card-body">
          <h5 class="card-title"><?= strip_tags(stripslashes($data['artist'])) ?></h5>
          <p class="card-text"><?= nl2br(strip_tags(stripslashes(substr($data['title'],0,200)))) ?></p>
          <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary track">voir plus</a>
        </div>
      </div>
    </div>

    <?php endwhile;?>

  </div>

  
  <?= $page = (!empty($_GET['page']) ? $_GET['page'] : 1); ?>

  <a href="?page=<?= $page - 1; ?>">Page précédente</a>
  <a href="?page=<?= $page + 1; ?>">Page suivante</a>




  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>