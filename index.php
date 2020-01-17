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

            case 'post':
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                  post();
              } else {
                  echo 'Erreur : aucun identifiant de billet envoyé';
              }
              break; 
              
              case 'addComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        echo 'Erreur : tous les champs ne sont pas remplis !';
                    }
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