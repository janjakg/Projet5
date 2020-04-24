<?php $title = htmlspecialchars($post['title']);?>

<?php ob_start();?>
<div class="headline">
  <div class="shadow-none m-5 pb-5 ">
    <h1 class="text-center"></h1>
  </div>
</div>
<!--Liste des posts -->
<section class="news">
  <div class="shadow-lg p-3 mb-5 bg-white rounded">

    <div class="container">
      <div class="row">
        <div class="col">
          <section id="player">
            <!--dz root correspond au player Deezer que nous utilisons-->
            <div id="dz-root"></div>
            <div id="player" style="width:100%;"></div>
            <br />
            <div id="controlers">
              <!--on a ici le button qui permet d'activer le player de Deezer-->
              <!--on récupère les infos de la base de données dans les balises PHP-->
              <input type="button" class="btn btn-info"
                onclick="DZ.player.playAlbum(<?=strip_tags(stripslashes($post['albumName']))?>); return false;"
                value="Activate the player" />
              <br />
              <br />
            </div>
          </section>
        </div>
        <div class="col">
          <div class="row row-cols-1 row-cols-md-3">
            <div class="text-center p-5">
              <img src="<?=strip_tags(stripslashes($post['imageAlbum']))?>" class="rounded" alt="album_cover">
            </div>
          </div>
        </div>
      </div>
    </div>

    <h2>"<?=strip_tags(stripslashes($post['title']))?>"</h2>
    <p>Est mon titre préféré de l'album de :
      <em><?=strip_tags(stripslashes($post['artist']))?></em>
    </p>
    <p>Vous pouvez indiquer le votre en commentaire</p>
    <div id="date">
      <em>le <?=$post['creation_date_fr']?></em>
    </div>

    <a href="index.php">retour à l'accueil</a>
  </div>
</section>
<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <h2>Commentaires</h2>
  <form action="index.php?action=addComment&amp;id=<?=$post['id']?>" method="post">
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
        <p><strong><?=htmlspecialchars($comment['author'])?></strong>
          le <?=$comment['comment_date_fr']?></p>
        <p><?=nl2br(htmlspecialchars($comment['comment']))?></p>
        <?php if ($comment['signalled'] == 0): ?>
        <a href="index.php?action=signalledComment&amp;idComment=<?=$comment['id']?>&amp;idPost=<?=$_GET['id']?>"
          class="btn btn-warning btn-sm active" role="button" aria-pressed="true">Signaler</a>
        <?php else: ?>
        <button class="btn btn-secondary"><em>commentaire signalé</em></button>
        <?php endif;?>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php else: ?>
<p>Pas de commentaire</p>
<?php endif;?>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>