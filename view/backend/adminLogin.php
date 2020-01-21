<?php $title = "Connexion";?>

<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg-light">
  <h1>CONNEXION</h1>
</div>

<form action="index.php?action=checkUser" class="shadow-none m-5" method="post">

  <div class="form-group row">
    <label for="pseudo" class="col-sm-2 col-form-label">Email :</label><br>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Votre email">
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Mot de passe :</label><br>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe">
    </div>
  </div>

  <div id="index.php?action=adminLogin">
    <button type="submit" class="btn btn-primary">Connexion</button>
  </div>

</form>


<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>