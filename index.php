<?php

require('controller/frontend.php');

try
{
    if (isset($_GET['action'])) {
        switch ($_GET['action'])  {
//accès au blog
            case 'listPosts':
              listPosts();
              break; 

              default:
              echo 'Pas d\'action';
              break;            
      }
  } else {
    listPosts();
  }
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}