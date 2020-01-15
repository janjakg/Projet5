<?php

require_once('model/PostManager.php');

//use Structure\{PostManager, Manager};

function listPosts()
{
    $postManager = new \Structure\PostManager();
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}
function post()
{
    $postManager = new \Structure\PostManager();
    $post = $postManager->getPost($_GET['id']);
    require('view/frontend/postView.php');
}