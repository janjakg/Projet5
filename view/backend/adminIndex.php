<?php $title = "Admin" ?>

<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">Tableau de bord</h1>
  </div>
</div>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Gérer les commentaires signalés
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"> 
      <div class="table-responsive-md">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Comment</th>
              <th colspan="2" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $signaledComments->fetch()):?>
            <tr>
              <td><?= nl2br(htmlspecialchars($row['comment'])) ?></td>
              <td><a class="btn btn-danger"
                  href="index.php?action=eraseComment&amp;idComment=<?= ($row['id']) ?>">Supprimer</a></td>
              <?php if ($row['signalled'] == 1): ?>
              <td><a href="index.php?action=saveComment&amp;commentId=<?= ($row['id']) ?>"
                  class="btn btn-success">Valider</a></td>
              <?php endif; ?>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>    
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <a href="index.php?action=adminCrud">
        Gestion du contenu : création, mise à jour et suppression
        </a>
      </h5>
    </div>    
  </div>

  

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>