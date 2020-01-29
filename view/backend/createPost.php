<?php $title = "Creer un post" ?>

<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">Nom du Site</h1>
  </div>
</div>

  <h2>Nouveau Post</h2>
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>
  <form action="index.php?action=sendPost" method="post">
    <div class="form-group">
      <label for="title">Titre</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
    <label for="contenu">Url</label>
    <textarea class="form-control" id="content" rows="3"></textarea>
  </div>

    <button type="submit" class="btn btn-primary" name="submit">Envoi</button>
  </form>


</section>


<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>