<?php $title = "Admin" ?>

<?php ob_start();?>

<!-- <div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">ADMIN</h1>
  </div>
</div>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <div class="container">
<p>Gérer les commentaires signalés
</p>
  </div>
</section>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <div class="container">
<p>Gestion du contenu : création, mise à jour et suppression
</p>
  </div>
</section>

<section class="shadow-lg p-3 mb-5 bg-white rounded">
  <div class="container">
<p>Coming soon...
</p>
  </div>
</section> -->


<div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">ADMIN</h1>
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
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion"> 
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
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Gestion du contenu : création, mise à jour et suppression
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Coming soon...
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>