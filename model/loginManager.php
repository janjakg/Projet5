<?php

namespace Structure;

require 'vendor/autoload.php';

class LoginManager extends Manager
{
  public function login($email, $password)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM members WHERE email=?');
    $req->execute([$email]);
    $member = $req->fetch();
    $password = password_verify($_POST['password'], $member['password']);

    return $member;
  }
}