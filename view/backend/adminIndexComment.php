<?php $title = "Post modifié" ?>

<?php ob_start(); ?>
<div class="shadow-none m-5 pb-5 bg-light">
  <h1>Commentaires signalés</h1>
</div>
<a  href="index.php?action=adminIndex" >
retour au tableau de bord
</a>

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
        <td><a href="index.php?action=saveComment&amp;commentId=<?= ($row['id']) ?>" class="btn btn-success">Valider</a>
        </td>
        <?php endif; ?>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>