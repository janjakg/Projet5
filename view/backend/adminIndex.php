<?php $title = "Admin" ?>

<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">Tableau de bord</h1>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 mb-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"> Gérer les commentaires signalés</h5>
        <p class="card-text">Cet espace permettra de modérer les commentaires.</p>
        <a href="index.php?action=adminIndexComment" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  
  <div class="col-sm-6 mb-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">  Gestion du contenu :</h5>
        <p class="card-text"> Espace pour création, mise à jour et suppression de titres.</p>
        <a href="index.php?action=adminCrud" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div> 

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>