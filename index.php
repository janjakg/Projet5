<?php

require('controller/frontend.php');
require('controller/backend.php');


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

              case 'signalledComment':
                if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                    signalledComment($_GET['idComment']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
                break;

              case 'adminRegistration': 
                                               
                  adminRegistration();
                  break;

              case 'checkRegistration':
                //Pour valider l'incription
                  if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['email2']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
                    checkRegistration($_POST['pseudo'], $_POST['email'],!empty($_POST['email2']), $_POST['password'],!empty($_POST['password2']));
                  }else {
                    echo 'vous devez vraiment remplir tous les champs!';
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