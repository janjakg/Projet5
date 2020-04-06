<?php $title = "Post à modifier" ?>

<?php ob_start(); ?>

<div class="shadow-none m-5 pb-5 bg">
  <h1 class="text-center">Mise à Jour</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <h2>Titre à modifier</h2>
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>

  <form action="index.php?action=updatePost&idPost=<?=$post['id'] ?>" method="post">
    <div class="form-group">
      <label for="artist">Artiste</label>
      <input type="text" class="form-control" name="artist" id="artist"
        value="<?= stripslashes(strip_tags($post['artist'])) ?>: <?=  stripslashes(strip_tags($post['title']))  ?>" >
    </div>
    <div class="form-group">
    <label for="title">Mise à jour :</label>
    <textarea class="form-control" id="title" rows="3"> Si ce titre ne vous convient pas supprimez le et selectionnez en un autre.</textarea>
  </div>
    
  </form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>