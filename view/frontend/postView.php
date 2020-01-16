<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="shadow-none m-5 pb-5 bg-azure">
  <div class="titre2">
    <h1 class="text-center">Track</h1>
  </div>
</div>
<!--Liste des posts -->
<section class="news">

  <div class="shadow-lg p-3 mb-5 bg-white rounded">

    <h2><?= strip_tags(stripslashes($post['title'])) ?></h2>
    <p>
      <?= strip_tags(stripslashes($post['artist'])) ?>
    </p>
    <div id="date">
      <em>le <?= $post['creation_date_fr'] ?></em>
    </div>
  
  <a href="index.php">retour à l'accueil</a>
  </div>
</section>
<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <h2>Commentaires</h2>
  <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group">
      <label for="author">Auteur</label>
      <input type="text" class="form-control" id="author" name="author" />
    </div>
    <div class="form-group">
      <label for="comment">Commentaire</label>
      <textarea class="form-control" id="comment" name="comment"></textarea>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Envoi</button>
    </div>
  </form>
</section>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>