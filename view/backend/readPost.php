<?php $title = "Lecture du Post" ?>

<?php ob_start(); ?>
<div class="shadow-none m-5 pb-5 bg-light">
  <h1>Nom du Site</h1>
</div>


<section class="shadow-lg p-3 mb-5 bg-white rounded" align-text="center">

   <div id="trackFont" >" <?= strip_tags(stripslashes(($displayPost['title'])))?> "</div>
  <p id="artistPosition">de:
    <strong><?= strip_tags(stripslashes(strtoupper($displayPost['artist']))) ?></strong>

  </p>

  <div class="col mb-5 pb-5">
      <div class="card" style="max-width: 18rem;">
        <img src="<?= strip_tags(stripslashes($displayPost['imageAlbum'])) ?>" , class="card-img-top" alt="album_cover">
        <div class="card-body">
          <h5 class="card-title"><?= strip_tags(stripslashes($displayPost['artist'])) ?></h5>
          <p class="card-text"><?= nl2br(strip_tags(stripslashes(substr($displayPost['title'],0,200)))) ?></p>
          <a href="index.php?action=post&amp;id=<?= $displayPost['id'] ?>" class="btn btn-primary track">voir plus</a>
        </div>
      </div>
    </div>

</section>



<section class="shadow-lg p-3 mb-5 bg-white rounded" id="player">
  <div id="dz-root"></div>
  <div id="player" style="width:100%;" align-text="center"></div>
  <br />
  <div id="controlers">

    <input type="button"
      onclick="DZ.player.playAlbum(<?= strip_tags(stripslashes($displayPost['albumName'])) ?>); return false;"
      value="activer le player avant de lancer la lecture" />

    <br />

    <br />


  </div>


</section>
<a href="index.php?action=adminCrud">Retour à la liste des titres</a>



<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>