<?php
require_once('model/Manager.php');

class PostManager extends Manager
{
  public function getPosts()
  {
    $db = $this-> dbconnect();
    $req = $db-> query('SELECT id, artist, title, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    
    return $req;
  }


}