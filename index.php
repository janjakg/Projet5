<?php
//namespace Structure;
//require 'vendor/autoload.php';
require('controller/frontend.php');

try
{
    if (isset($_GET['action'])) {
        switch ($_GET['action'])  {
//accès au blog
            case 'listPosts':
              listPosts();
              break; 

            case 'post':
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                  post();
              } else {
                  echo 'Erreur : aucun identifiant de billet envoyé';
              }
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