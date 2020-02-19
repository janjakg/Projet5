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

              case 'saveComment':
                //Nous sauvegardons le commentaire
                  if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                    saveComment($_GET['commentId']);
                  } else {
                    throw new Exception('aucun identifiant de commentaire sauvegardé');
                  }
                  break;
                  
              case 'adminCrud' :
                postListing();
                break;

              case 'erasePost' :
                  if(isset($_GET['idPost']) && isset($_GET['idComment']) && $_GET['idPost'] > 0) {
                    erasePost($_GET['idPost'], $_GET['idComment']); 
                    
                  } else {
                    throw new Exception('aucun identifiant de post supprimé');
                  }
                  break;

              case 'readPost' :
                if(isset($_GET['postId']) && $_GET['postId'] > 0) {
                  readPost($_GET['postId']);
                } else {
                  throw new Exception('aucun identifiant d\'article renseigné');
                }
                break;

              case 'editPost':
                editPost($_GET['idPost']);
                break; 

              case 'updatePost':
                //Nous procédons ici à la mise à jour            
                if(!empty($_POST['artist']) && !empty($_POST['title'])) {
                      updatePost($_GET['idPost'],addslashes(strip_tags($_POST['artist'])), addslashes(strip_tags($_POST['title'])),addslashes(strip_tags($_POST['albumName'])),addslashes(strip_tags($_POST['imageAlbum'])));              
                  } else {
                      throw new Exception('Aucun post updated');
                  }             
                  break;

              case 'createPost' : 
                //Nous accédons à la page de création de post                  
                    createPost();                                                   
                  break;

              case 'sendPost' :
                //Nous envoyons le post
                  if(!empty($_POST['artist']) && !empty($_POST['title']) && !empty($_POST['albumName']) && !empty($_POST['imageAlbum'])) {
                    sendPost(addslashes(strip_tags($_POST['artist'])),addslashes(strip_tags($_POST['title'])),addslashes(strip_tags($_POST['albumName'])),addslashes(strip_tags($_POST['imageAlbum'])));
                      } else {              
                      throw new Exception('Merci de créez votre poste');                    
                  }           
                  break;

              case 'adminLogout':  
                //session_start() ; 
                if(isset($_SESSION['pseudo']))  {
                  $_SESSION = array();
                  session_destroy();
                  echo'session terminée';                 
                  header('Location: index.php?action=adminLogin');                             
                  
                }  else {
                  throw new exception('logout non fonctionnel');
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