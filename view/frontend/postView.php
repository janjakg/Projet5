<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="shadow-none m-5 pb-5 bg-azure">
  <div class="titre2">
    <h1 class="text-center">Track</h1>
  </div>
</div>
<!--Liste des posts -->
<section class="news">
    

  <div class="shadow-lg p-3 mb-5 bg-white rounded" >
  
  <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
  <div id="player">
  
  </div>

    <h2>"<?= strip_tags(stripslashes($post['title'])) ?>"</h2>
    <p>Titre de : 
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
<!--lancement d'une condition avec une boucle pour récupérer les commentaires -->
<?php if ($comments): ?>
<div class="shadow-lg p-3 mb-5 bg-azure rounded">
  <div class="comments">
    <?php foreach ($comments as $comment): ?>
    <div class="card mb-4">
      <div class="card-body">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong>
          le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php if ($comment['signalled'] == 0): ?>
        <a href="index.php?action=signalledComment&amp;idComment=<?= $comment['id'] ?>&amp;idPost=<?= $_GET['id'] ?>"
          class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Signaler</a>
        <?php else: ?>
        <button class="btn btn-secondary"><em>commentaire signalé</em></button>
        <?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<?php else: ?>
<p>Pas de commentaire</p>
<?php endif; ?>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>