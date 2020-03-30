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
    
      <section id="player">
        <div id="dz-root"></div>
        <div id="player" style="width:100%;" ></div>
        <br />
        <div id="controlers">

          <input type="button" onclick="DZ.player.playAlbum(<?= strip_tags(stripslashes($post['albumName'])) ?>); return false;"
            value="activer le player" />
         
          <br />        

          <br />
          <input type="button" onclick="DZ.player.play(); return false;" value="Play" />
          <input type="button" onclick="DZ.player.pause(); return false;" value="Pause" />
          <input type="button" onclick="DZ.player.prev(); return false;" value="Prev" />
          <input type="button" onclick="DZ.player.next(); return false;" value="Next" />
          <br />
          <input type="button" onclick="DZ.player.setMute(); return false;" value="Set Mute" />
          <input type="button" onclick="DZ.player.setVolume(20); return false;" value="Set Volume 20" />
          <input type="button" onclick="DZ.player.setVolume(80); return false;" value="Set Volume 80" />

          <br /><br /><br />
        </div>
        <div id="slider_seek" class="progressbarplay" style="">
          <div class="bar" style="width: 0%;"></div>
        </div>    
      </section>  

    <h2>"<?= strip_tags(stripslashes($post['title'])) ?>"</h2>
    <p>Est mon titre préféré de l'album de :
      <em><?= strip_tags(stripslashes($post['artist'])) ?></em>
    </p>
    <p>Vous pouvez indiquer le votre en commentaire</p>
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