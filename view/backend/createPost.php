<?php $title = "Creer un post" ?>

<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">Nom du Site</h1>
  </div>
</div>

  <h2>Insertion</h2>
  <a href="index.php?action=adminCrud">Retour à la liste des titres</a>
  <form action="index.php?action=sendPost" method="post">
    <div class="form-group">
      <label for="artist">Artiste</label>
      <input type="text" class="form-control" name="artist" id="artist">  
      <div style="display:none; color: #f55"; id="error message"></div>      
    </div>  
   <div class="form-group">
      <label for="title">Titre</label>    
      <select name="title" type="text" class="form-control" name="title" id="title"></select>      
    </div> 
    <div class="form-group">
      <label for="album">Album</label>    
      <select name="album" type="text" class="form-control" name="album" id="album"></select>      
    </div>    
    <div class="form-group">
      <label for="image">Image</label>    
      <select name="image" type="int" class="form-control" name="image" id="image"></select>      
    </div>
    
    

    <button type="submit" class="btn btn-primary" name="submit">Envoi</button>
  </form>


</section>


<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>