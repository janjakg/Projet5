<?php

require 'vendor/autoload.php';

use Structure\{PostManager, Manager, CommentManager, RegistrationManager};

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