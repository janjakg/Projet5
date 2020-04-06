<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fa6a9c271b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
  <title>projet5</title>
  <link rel="stylesheet" href="public/css/style.css">
</head>

<body class="frontBody">
  <div class="bloc_page">
    <nav class="navbar sticky-top navbar  navbar navbar-dark bg-dark">
      <?php if (isset($_SESSION['pseudo'])) :?>
      <span class="badge badge-pill badge-success">connecté </span>
      <?php else :?>
      <p> </p>
      <?php endif;?>
      <a class="navbar-brand" href="#">PLAY MY LIST</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php if (isset($_SESSION['pseudo'])) :?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=adminLogin">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=adminLogout">déconnexion</a>
          </li>
          <?php else :?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=adminRegistration">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=adminLogin">Connexion</a>
          </li>
          <?php endif;?>
        </ul>
      </div>
    </nav>

    <div class="container">
    <div class="page">
      <?= $content ?>
    </div>
  </div>
  </div>


  <nav class="navbar sticky-bottom navbar-light navbar-dark bg-dark">
    <div class="container">
      <h2 class="navbar-text">Contact</h2>
      <p class="navbar-text">Ceci est un site étudiant réalisé dans le cadre d'un projet</p>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <div id="dz-root"></div>
  <script src="https://e-cdns-files.dzcdn.net/js/min/dz.js"></script>

  <script src="public/js/track.js"></script>
  <script src="public/js/player.js"></script>
  <script src="public/js/intro.js"></script>

</body>

</html>