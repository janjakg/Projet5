<?php

namespace Structure;

require 'vendor/autoload.php';
class PostManager extends Manager
{
  public function getPosts()
  {
    $db = $this-> dbConnect();
    $req = $db-> query('SELECT id, artist, imageAlbum, title, albumName, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 9');
    
    return $req;
  }

  public function getPost(int $id)
  {
    $db = $this-> dbConnect();
    $req = $db->prepare('SELECT id, artist,imageAlbum, title, albumName, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute([$id]);
    $post = $req->fetch();

    return $post;
  }

  public function deletePost($idComment, $idPost)
  {
    $db = $this->dbconnect();
    $req = $db->prepare('DELETE comments, posts FROM comments, posts WHERE comments.post_id = ? AND posts.id = ?');
    $destroyPost = $req->execute(array($idComment, $idPost));

    return $destroyPost;
  }

  public function updatePost($id, $artist, $title, $albumName, $imageAlbum)
  {
    $db = $this->dbconnect();    
    $req = $db->prepare('UPDATE posts SET artist = :artist, title = :title, albumName = :albumName, imageAlbum = :imageAlbum WHERE id = :id');
    
    $postModified = $req->execute([ 
      'artist'=> $artist,     
      'title' => $title,
      'albumName' => $albumName,
      'imageAlbum'=> $imageAlbum,
      'id' => $id,
    ]);
  }

  public function addPost()
  {
    $db = $this->dbconnect();
    $req = $db->prepare("INSERT INTO posts( artist, title, albumName, imageAlbum) VALUES ('?','?','?','?')");
    $postAdded = $req;
   
    return $postAdded;
  }
  public function postSender($artist, $title, $albumName, $imageAlbum)
  {
    $db = $this->dbconnect();
    $req = $db->prepare("INSERT INTO posts( artist, title, albumName, imageAlbum) VALUES ('$artist','$title','$albumName','$imageAlbum')");
    $forward = $req->execute([$artist, $title, $albumName, $imageAlbum]);

    return $forward;
  } 
}