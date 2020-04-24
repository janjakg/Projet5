<?php

require 'vendor/autoload.php';

use Structure\CommentManager;
use Structure\PostManager;

function listPosts()
{
    //Ici on pourra gérer à la fois la liste des posts ainsi que la pagination
    $postManager = new \Structure\PostManager();
    $posts = $postManager->getPosts();
    $nbPosts = $postManager->postCount();
    $limite = 6;
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $totalPages = ceil($nbPosts / $limite);
    require 'view/frontend/listPostsView.php';
}
function post()
{
//gestion des posts et des commentaires au niveau de la lecture des titres dans le frontend
    $postManager = new \Structure\PostManager();
    $commentManager = new \Structure\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require 'view/frontend/postView.php';
}
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('location: index.php?action=post&id=' . $postId);
    }
}
function signalledComment($commentId)
{
    $commentManager = new CommentManager();
    $updateComment = $commentManager->signalledComments($commentId);
    if ($updateComment === false) {
        throw new Exception('Problème dans la mise à jour');
    } else {
        require 'view/frontend/signalledComment.php';
    }
}
