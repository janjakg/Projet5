<?php

namespace Structure;

require 'vendor/autoload.php';

class RegistrationManager extends Manager 
{
  public function register($pseudo, $email, $email2, $password, $password2)
  {
    $db = $this->dbconnect();  
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);   
    $req = $db->prepare("INSERT INTO members(pseudo, email, password) VALUES('$pseudo', '$email', '$password')");
    $registration = $req->execute([$pseudo, $email, $email2, $password, $password2]);
      
    return $registration;
  }
}

