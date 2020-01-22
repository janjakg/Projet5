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

              case 'adminLogin':
                //Avec cette condition si la session est commencée il ne sera pas nécessaire que le script nous amène sur la page de login  
                if(isset($_SESSION['pseudo'])) {
                    header('Location:index.php?action=adminIndex');
                } else {
                  adminLogin();
                }    
                  break;
  
              case 'checkUser':
                //Vérification du login
                  if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    checkUser($_POST['email'], $_POST['password']);
                  } else {
                    echo 'vous devez remplir tous les champs!';
                    require('view/backend/adminLogin.php'); 
                  }              
                  break;
                  
              case 'adminIndex':           
                getSignaledComments();
                  break;

              case 'eraseComment':
                if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                  eraseComment( $_GET['idComment']);
                } else {
                  throw new Exception(' aucun identifiant de commentaire effacé');
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