<?php $title = "Creer un post" ?>

<?php ob_start();?>

<h2>Insertion</h2>
<a href="index.php?action=adminCrud">Retour à la liste des titres</a>
<form action="index.php?action=sendPost" method="post" class="form-inline">
  <div class="form-group mx-sm-3 mb-2 pt-2">

    <input type="text" class="form-control" id="artist" placeholder="artiste ou titre">
    <div style="display:none; color: #f55" ; id="error message"></div>
  </div>
  <input type="button" class="btn btn-primary mb-2 " value="validArtist" onclick="buttonClickGet()" />
</form>

</form>
<div class="table-responsive" style="display:none" id="zoneArtist">

  <table class="table table-hover ">
    <thead>
      <tr id="zoneArtist">
        <th scope="col"> </th>
        <th id="infoToPaste" scope="col"> </th>
      </tr>
    </thead>
    <tbody class="table-info">
      <tr id="zoneArtist">
        <th scope="row">Nom de l'artiste :</th>
        <td id="artistName" spellcheck="false">Artiste</td>
      </tr>
      <tr id="zoneArtist">
        <th scope="row">Artiste id :</th>
        <td id="artistId">Artiste id</td>
      </tr>
      <tr id="zoneArtist">
        <th scope="row">Titre :</th>
        <td id="artistTrack">Titre</td>
      </tr>
      <tr id="zoneArtist">
        <th scope="row">Album id :</th>
        <td id="albumName">Album id</td>
      </tr>
      <tr id="zoneArtist">
        <th scope="row">Url :</th>
        <td id="imageAlbum">Url</td>
      </tr>
    </tbody>
  </table>
</div>

<p id="instructions"></p>

<form action="index.php?action=sendPost" method="post">
  <div class="form-group">
    <label for="title">artist</label>
    <input type="text" class="form-control" name="artist" id="artist" placeholder="coller le nom de l'artiste">
  </div>
  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="coller le titre">
  </div>
  <div class="form-group">
    <label for="title">Album</label>
    <input type="text" class="form-control" name="albumName" id="albumName" placeholder="coller l'album id">
  </div>
  <div class="form-group">
    <label for="title">Cover</label>
    <input type="text" class="form-control" name="imageAlbum" id="imageAlbum" placeholder="coller l'url">
  </div>

  <button type="submit" class="btn btn-primary mb-4" name="submit">Envoi</button>
</form>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>