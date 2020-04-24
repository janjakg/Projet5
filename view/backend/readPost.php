<?php $title = "Lecture du Post"?>

<?php ob_start();?>
<div class="shadow-none m-5 pb-5 bg">
  <h1 class="text-center">Lecture</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded" align-text="center">
  <!--On va récupérer ici dans les balises PHP les données nécessaires à notre affichage-->
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>
  <div id="trackFont">" <?=strip_tags(stripslashes(($displayPost['title'])))?> "</div>
  <p id="artistPosition">de:
    <strong><?=strip_tags(stripslashes(strtoupper($displayPost['artist'])))?></strong>
  </p>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?=strip_tags(stripslashes($displayPost['imageAlbum']))?>" , class="card-img-top" alt="album_cover">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?=strip_tags(stripslashes($displayPost['artist']))?></h5>
          <p class="card-text"><?=nl2br(strip_tags(stripslashes(substr($displayPost['title'], 0, 200))))?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="shadow-lg p-3 mb-5 bg-white rounded" id="player">
  <div id="dz-root"></div>
  <div id="player" style="width:100%;" align-text="center"></div>
  <br />
  <div id="controlers">
    <input type="button" class="btn btn-info"
      onclick="DZ.player.playAlbum(<?=strip_tags(stripslashes($displayPost['albumName']))?>); return false;"
      value="activer le player pour la lecture" />
    <br />
    <br />
  </div>
</section>

<?php $content = ob_get_clean();?>

<?php require 'adminTemplate.php';?>