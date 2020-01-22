<?php

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