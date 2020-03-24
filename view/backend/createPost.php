<?php $title = "Creer un post" ?>

<?php ob_start();?>
<!--
<div class="shadow-none m-5 pb-5 bg-light">
  <div class="titre2">
    <h1 class="text-center">Nom du Site</h1>
  </div>
</div>
-->
<h2>Insertion</h2>
<a href="index.php?action=adminCrud">Retour à la liste des titres</a>
<form action="index.php?action=sendPost" method="post" class="form-inline" >
  <div class="form-group mx-sm-3 mb-2">
   
    <input type="text" class="form-control" id="artist" placeholder="artiste ou titre">
    <div style="display:none; color: #f55" ; id="error message"></div>
  </div>
  <input type="button" class="btn btn-primary mb-2" value="validArtist" onclick="buttonClickGet()" />
  </form>

 
  <!--<form class="form-inline">
<div class="form-group mx-sm-3 mb-2">
    <label for="artist" class="sr-only">Artiste</label>
    <input type="text" class="form-control" id="artist" placeholder="artist">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
</form>


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
    
      <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
    

    <button type="submit" class="btn btn-primary" name="submit">Envoi</button>
  </form>
  -->
  

  <!--<div class="mb-3">
    <label for="validationTextarea"></label>
    <textarea class="form-control " id="zoneArtist" placeholder="infos artiste" style="display:none"
      required></textarea>    
  </div>
  
  <div id="zoneArtist" style="display:none" >
    artiste :<div id="artistName">a</div>
    <p id="artistId">b</p>
    <p id="artistTrack">c</p>
    <p id="albumName">d</p>
    <p id="imageAlbum">e</p>
  </div>-->
</form>

<table class="table table-hover table-dark"  >

  <tbody id="zoneArtist" style="display:none">
    <tr>
      <th scope="row" >Artiste</th>
      <td id="artistName"></td>      
    </tr>
    <tr>
      <th scope="row"  >Artiste id</th>
      <td id="artistId"></td>     
    </tr>
    <tr>
      <th scope="row"  >Titre connu</th>      
      <td id="artistTrack"></td>
    </tr>
    <tr>
      <th scope="row" >Album id</th>      
      <td id="albumName" ></td>
    </tr>
    <tr>
      <th scope="row"  >Url</th>      
      <td id="imageAlbum"></td>
    </tr>


  </tbody>
</table>


<p id="instructions"></p>

<!--<form action="index.php?action=sendPost" method="post">
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="artist">Artiste</span>
    </div>
    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="title">titre</span>
    </div>
    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="albumName">Album id</span>
    </div>
    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
  </div>
  <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="imageAlbum">Couverture de l'album (url)</span>
    </div>
    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Envoi</button>

</form>-->


  <form action="index.php?action=sendPost" method="post">
    <div class="form-group">
      <label for="title">artist</label>
      <input type="text" class="form-control" name="artist" id="artist">
    </div>
    <div class="form-group">
      <label for="title">Titre</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="title">Album</label>
      <input type="text" class="form-control" name="albumName" id="albumName">
    </div>
    <div class="form-group">
      <label for="title">Cover</label>
      <input type="text" class="form-control" name="imageAlbum" id="imageAlbum">
    </div>
   

    <button type="submit" class="btn btn-primary" name="submit">Envoi</button>
  </form>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>