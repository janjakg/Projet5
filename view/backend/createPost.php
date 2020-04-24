<?php $title = "Creer un post"?>
<!-- Ici on va créer nos posts : les titres que l'on souhaite faire écouter -->
<?php ob_start();?>

<h1>Recherche d'un titre ou d'un artiste</h1>
<a href="index.php?action=adminCrud">Retour à la liste des titres</a>
<!-- On a d'abord un module de recherche pour choisir le titre souhaité  -->
<form action="index.php?action=sendPost" method="post" class="form-inline">

  <div class="form-group mx-sm-3 mb-2 pt-2">
    <input type="text" class="form-control" id="artist" placeholder="artiste ou titre">
    <div style="display:none; color: #f55" ; id="error message"></div>
  </div>
  <!-- On va cliquer un bouton qui va récupérer les infos que l'on souhaite dans l'API de DEEZER -->
  <input type="button" class="btn btn-primary mb-2 " value="search" onclick="buttonClickGet()" />
</form>
<!-- Voici un tableau qui apparaitra pour afficher le résultat renvoyé par l'API  -->
<div class="table-responsive" style="display:none" id="zoneArtist">
  <table class="table table-hover ">
    <thead>
      <tr id="zoneArtist">
        <th scope="col"> </th>
        <th id="infoToPaste" scope="col"> </th>
        <th scope="col"> </th>
      </tr>
    </thead>
    <tbody class="table-info">
      <tr id="zoneArtist">
        <th scope="row">Nom de l'artiste :</th>
        <td><a id="artistName"> Artiste </a>
        </td>
        <td>
          <a>
            <!--On pourra copier les infos et les coller sur le tableau qui suivra celui ci pour envoyer ces données à la base de données -->
            <button onclick="copyToClip(document.getElementById('artistName').innerHTML)" class="btn btn-info"
              data-toggle="tooltip" data-placement="top" title="copier"> <i class="far fa-copy" id="btnCopy"></i>
            </button>
          </a>
        </td>
      </tr>
      <tr id="zoneArtist">
        <th scope="row">Titre :</th>
        <td><a id="artistTrack">Titre</a>
        </td>
        <td>
          <a>
            <button onclick="copyToClip(document.getElementById('artistTrack').innerHTML)" class="btn btn-info"
              data-toggle="tooltip" data-placement="top" title="copier"> <i class="far fa-copy" id="btnCopy"></i>
            </button>
          </a>
        </td>
      </tr>
      <tr id="zoneArtist">
        <th scope="row">Album id :</th>
        <td><a id="albumName">Album id</a>
        </td>
        <td>
          <a>
            <button onclick="copyToClip(document.getElementById('albumName').innerHTML)" class="btn btn-info"
              data-toggle="tooltip" data-placement="top" title="copier"> <i class="far fa-copy" id="btnCopy"></i>
            </button>
          </a>
        </td>
      </tr>
      <tr id="zoneArtist">
        <th scope="row">Url :</th>
        <td><a id="imageAlbum">Url</a>
        </td>
        <td>
          <a>
            <button onclick="copyToClip(document.getElementById('imageAlbum').innerHTML)" class="btn btn-info"
              data-toggle="tooltip" data-placement="top" title="copier"> <i class="far fa-copy" id="btnCopy"></i>
            </button>
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<p id="instructions"></p>
<!-- Tableau dans lequel on peut coller les infos reçues du tableau précédent -->
<form action="index.php?action=sendPost" method="post" style="display:none" id="form">
  <div class="form-group">
    <label for="title">Artiste</label>
    <input type="text" class="form-control" name="artist" id="pasteArtist" placeholder="coller le nom de l'artiste">
  </div>
  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" class="form-control" name="title" id="pasteTitle" placeholder="coller le titre">
  </div>
  <div class="form-group">
    <label for="title">Album</label>
    <input type="number" class="form-control" name="albumName" id="pasteAlbumName" placeholder="coller l'album id">
  </div>
  <div class="form-group">
    <label for="title">Cover</label>
    <input type="url" class="form-control" name="imageAlbum" id="pasteImageAlbum" placeholder="coller l'url">
  </div>

  <button type="submit" class="btn btn-primary mb-4" name="submit">Envoi</button>
</form>

<?php $content = ob_get_clean();?>

<?php require 'adminTemplate.php';?>