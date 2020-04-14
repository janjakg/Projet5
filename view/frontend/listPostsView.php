<?php 

$title = "Decouvertes"; 
?>

<?php ob_start();?>
<div class="banner">

  <div class="jumbotron ">
    <div class="container">
      <h1 class="animation">.</h1>
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
          <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary track"><i
              class="fas fa-play-circle"></i> Play</a>
        </div>
      </div>
    </div>

    <?php endwhile;?>

  </div>

  <?php $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $lastPage = 5; 
  ?>

  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

      <?php

/* Pagination
 * Si on est sur la première page, on n'a pas besoin d'afficher de lien
 * vers la précédente. On va donc l'afficher que si on est sur une autre
 * page que la première */

if ($page > 1):
    ?><li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li> <?php
endif;

/* On va effectuer une boucle autant de fois que l'on a de pages */
for ($i = 1; $i <= $lastPage; $i++):
    ?><li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> <?php
endfor;

/* Avec le nombre total de pages, on peut aussi masquer le lien
 * vers la page suivante quand on est sur la dernière */
if ($page < $lastPage):
    ?><li class="page-item"> <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li><?php
endif;
?>
    </ul>
  </nav>

  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>