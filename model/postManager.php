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

  public function deletePost($idComment, $idPost)
  {
    $db = $this->dbconnect();
    $req = $db->prepare('DELETE comments, posts FROM comments, posts WHERE comments.post_id = ? AND posts.id = ?');
    $destroyPost = $req->execute(array($idComment, $idPost));

    return $destroyPost;
  }

  public function updatePost($id, $title, $content)
  {
    $db = $this->dbconnect();    
    $req = $db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
    
    $postModified = $req->execute([      
      'title' => $title,
      'content' => $content,
      'id' => $id,
    ]);
  }

  public function addPost()
  {
    $db = $this->dbconnect();
    $req = $db->prepare("INSERT INTO posts( title, content) VALUES ('?','?' )");
    $postAdded = $req;
   
    return $postAdded;
  }
  public function postSender($title,$content)
  {
    $db = $this->dbconnect();
    $req = $db->prepare("INSERT INTO posts( title, content) VALUES ('$title', '$content')");
    $forward = $req->execute([$title,$content]);

    return $forward;
  } 
}