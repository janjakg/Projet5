<?php $title = "Post à modifier"?>

<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg">
  <h1 class="text-center">Mise à Jour</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <h2>Titre à modifier</h2>
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>

  <form action="index.php?action=updatePost&idPost=<?=$post['id']?>" method="post">
    <div class="form-group">
      <label for="artist">Titre</label>
      <input type="text" class="form-control" name="artist" id="artist"
        value="<?=stripslashes(strip_tags($post['artist']))?>: <?=stripslashes(strip_tags($post['title']))?>">
    </div>
    <p>Si ce titre ne vous convient pas <a href="index.php?action=adminCrud"><strong>SUPPRIMEZ LE,</strong></a> et
      n'hesitez pas à en choisir un autre</p>
    <a href="index.php?action=createPost" class="btn btn-primary">Nouvelle recherche</a>

  </form>
</section>

<?php $content = ob_get_clean();?>

<?php require 'adminTemplate.php';?>