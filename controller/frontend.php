<?php

require 'vendor/autoload.php';

use Structure\{PostManager, Manager, CommentManager};
<<<<<<< HEAD
=======
<<<<<<< HEAD

//use Structure\{PostManager, Manager};

function listPosts()
{
<<<<<<< HEAD
    $postManager = new \Structure\PostManager();
=======
    $postManager = new \Structure\PostManager();    
>>>>>>> pagination2
=======
>>>>>>> master

function listPosts()
{
    $postManager = new \Structure\PostManager();    
<<<<<<< HEAD
=======
>>>>>>> pagination2
>>>>>>> master
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}
function post()
{
    $postManager = new \Structure\PostManager();
<<<<<<< HEAD
    $commentManager = new \Structure\CommentManager();
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
    $commentManager = new \Structure\CommentManager();
>>>>>>> pagination2
=======
    $commentManager = new \Structure\CommentManager();
>>>>>>> pagination2
>>>>>>> master
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
}
function addComment($postId, $author, $comment)
{
  $commentManager = new CommentManager();
  $affectedLines = $commentManager->postComment($postId, $author, $comment);

  if($affectedLines === false){
    throw new Exception('Impossible d\'ajouter le commentaire !');
  }else{
    header('location: index.php?action=post&id=' . $postId);
  }
}
function signalledComment($commentId)
{
    $commentManager = new CommentManager();
    $updateComment = $commentManager->signalledComments($commentId);
    if($updateComment === false) {
      throw new Exception('Problème dans la mise à jour');
    }
    else {
        require('view/frontend/signalledComment.php');
    }
}
