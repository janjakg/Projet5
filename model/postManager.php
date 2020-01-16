<?php

namespace Structure;

require 'vendor/autoload.php';
class PostManager extends Manager
{
  public function getPosts()
  {
    $db = $this-> dbConnect();
    $req = $db-> query('SELECT id, artist, title, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 9');
    
    return $req;
  }

  public function getPost(int $id)
  {
    $db = $this-> dbConnect();
    $req = $db->prepare('SELECT id, artist, title, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute([$id]);
    $post = $req->fetch();

    return $post;
  }
}