<?php

namespace Structure;

require 'vendor/autoload.php';

class CommentManager extends Manager
{
  public function getComments($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT (comment_date, \'%d/%m/%Y\') AS comment_date_fr, signalled FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $req->execute([$postId]);
    $comments = $req->fetchAll();

    return $comments;
  }
  public function postComment($postId, $author, $comment)
  {
      $db =$this->dbConnect();
      $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, signalled) VALUES(?, ?, ?, NOW(), 0)');
      $affectedLines = $req->execute([$postId, $author, $comment]);
  }
  public function signalledComments($commentId)
  {
      $db = $this->dbConnect();
      $req = $db->prepare('UPDATE comments SET signalled = 1 WHERE comments.id = ?');  
      $updateComment = $req->execute([$commentId]);

      return $updateComment;
  }
}