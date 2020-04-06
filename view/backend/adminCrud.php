<?php $title = "Commentaire sauvegardé" ?>

<?php ob_start(); ?>


<section class="shadow-none p-3 mb-5  rounded" >
 <h1 class="text-center">Gestion du contenu</h1>
</section>
<a href="index.php?action=adminIndex">
retour au tableau de bord
</a>

<div class="row">
      <h2 class="mb-5">Liste des posts : </h2>
    </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-dark">
          <thead>
            <th colspan="6" scope="col"><a class="btn btn-success" href="index.php?action=createPost">Insérer nouveau titre
                </a></th>
            <tr>
              <th scope="col">Titre</th>
              <th scope="col">Artiste</th>            
              <th colspan="3" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($list = $nombredElementsTotal->fetch()): ?>
            <tr>
              <td><strong><?= (stripslashes(strip_tags($list['title']))) ?></strong></td>
              <td><?= stripslashes(strip_tags((substr($list['artist'],0,90)))) ?></td>
              <td><a class="btn btn-secondary" href="index.php?action=readPost&amp;postId=<?=($list['id']) ?>">Read</a>
              </td>
              <td><a class="btn btn-info" href="index.php?action=editPost&amp;idPost=<?= ($list['id']) ?>">Update</a>
              </td>
              <td><a class="btn btn-danger"
                  href="index.php?action=erasePost&amp;idPost=<?= ($list['id']) ?>&amp;idComment=<?= ($list['id']) ?>">Delete</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>