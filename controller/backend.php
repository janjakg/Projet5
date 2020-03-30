<?php
session_start();
require 'vendor/autoload.php';

use Structure\{PostManager, Manager, CommentManager, RegistrationManager, LoginManager};

function adminRegistration()
{      
    require('view/backend/adminRegistration.php');
}
function checkRegistration($pseudo, $email, $email2, $password, $password2)
{
    $registrationManager = new \structure\RegistrationManager();
    $registration = $registrationManager->register($pseudo, $email, $email2, $password, $password2);

    if($email == $email2 && $password == $password2) {
      echo'inscription réussie';
      require('view/backend/adminLogin.php'); 
    }else {
      throw new exception('Merci de revoir vos mots de passe ou emails');
    }             
}
function adminLogin()
{   
    if(isset($_SESSION['pseudo']) && isset($_SESSION['password'])) {
      require('view/backend/adminIndex.php');  
    } else {
      require('view/backend/adminLogin.php');  
    }  
}

function checkUser($email,$password)
{
    $loginManager = new LoginManager();
    $member = $loginManager->login($email,$password);
    $isPasswordCorrect = password_verify($_POST['password'], $member['password']); 

    if(!$member) {  
      echo 'Mauvais identifiant ou mot de passe';
      require('view/backend/adminLogin.php'); 
    } else {
          if($isPasswordCorrect) { 
          $_SESSION['pseudo'] = $member['pseudo'];     
          $_SESSION['email'] = $member['email'];       
          getSignaledComments();      
          } else {
              echo 'Mauvais identifiant ou mot de passe !'; 
              require('view/backend/adminLogin.php');            
              }     
    }
}
function getSignaledComments()
{
    $commentManager = new \Structure\CommentManager();
    $signaledComments = $commentManager->getSignaledComments();
   
    if ($signaledComments === false) {
        throw new Exception('aucun commentaire signalé');
    } else {
      require('view/backend/adminIndex.php');
    }
}

function displaySignaledComment()
{
  $commentManager = new \Structure\CommentManager();
  $signaledComments = $commentManager->getSignaledComments();
 
  if ($signaledComments === false) {
      throw new Exception('aucun commentaire signalé');
  } else {
    require('view/backend/adminIndexComment.php');
  }
}
function eraseComment($idComment)
{
    $commentManager = new CommentManager();
    $destroyComment = $commentManager->deleteComment($idComment);

    if($destroyComment === false) {
      throw new Exception('commentaire non supprimé');
    }
    else {
      require('view/backend/eraseComment.php');
    }
}
function saveComment($commentId)
{
    $commentManager = new CommentManager();
    $updateSignaledComment = $commentManager->retainComment($commentId);

    if($updateSignaledComment === false) {
      throw new Exception('commentaire non sauvegardé');
    }
    else {
      require('view/backend/saveComment.php');
    }
}
function postListing()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/adminCrud.php');
}
function erasePost($idComment, $idPost)
{
    $postManager = new PostManager();
    $destroyPost = $postManager->deletePost($idComment, $idPost);

    if($destroyPost === false) {
      throw new Exception('post non supprimé');
    }
    else {
      require('view/backend/erasePost.php');
    }
}
function readPost($id)
{
    $postManager = new PostManager();
    $displayPost = $postManager->getPost($id);

    if($displayPost === false) {
      throw new Exception('post non affiché');
    }
    else {
      require('view/backend/readPost.php');
    }
}
function updatePost($id, $artist,$title,$albumName,$imageAlbum)
{
    $postManager =  new PostManager();
    $postModified = $postManager->updatePost($id, $artist,$title,$albumName,$imageAlbum);

    if($postModified === false) {
      throw new Exception('post non modifié');
    }
    else {
      require('view/backend/updateInfo.php');
    }
}
function editPost($id)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($id);

    if($post === false) {
      throw new exception('post inexistant');
    }
    else{
      require('view/backend/editPost.php');
    }
}
function createPost()
{
    $postManager = new PostManager();
    $postAdded = $postManager->addPost();   

    if ($postAdded === false) {
        throw new Exception('impossible d\ajouter le post!');
    } else {
      require('view/backend/createPost.php'); 
    }    
}
function sendPost($artist,$title,$albumName, $imageAlbum)
{
    $postManager = new PostManager();
    $forward = $postManager->postSender($artist, $title, $albumName, $imageAlbum);

    if ($forward === false) {
      throw new Exception('impossible d\envoyer le post!');
    } else {
      require('view/backend/updateInfo.php');
    }
}
function adminLogout()
{
    $loginManager = new LoginManager();
    $disconnect = $loginManager->logout();

    header('Location: index.php?action=adminLogout'); 
}


