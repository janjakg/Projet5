<?php
require 'vendor/autoload.php';

use Structure\{PostManager, Manager, CommentManager};

function listPosts()
{
    $postManager = new \Structure\PostManager();    
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}
function post()
{
    $postManager = new \Structure\PostManager();
    $commentManager = new \Structure\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
}