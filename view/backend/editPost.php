<?php $title = "Post à modifier" ?>

<?php ob_start(); ?>

<div class="shadow-none m-5 pb-5 bg-light">
  <h1 class="text-center">Nom du Site</h1>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <h2>Titre à modifier</h2>
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>

  <form action="index.php?action=updatePost&idPost=<?=$post['id'] ?>" method="post">
    <div class="form-group">
      <label for="artist">Artiste</label>
      <input type="text" class="form-control" name="artist" id="artist"
        value="<?= stripslashes(strip_tags($post['artist'])) ?>">
    </div>
    <div class="form-group">
    <label for="title">Contenu</label>
    <textarea class="form-control" id="title" rows="3"><?= stripslashes(strip_tags($post['title']))  ?></textarea>
  </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </form>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>