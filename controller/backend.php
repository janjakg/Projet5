<?php
session_start();
require 'vendor/autoload.php';

use Structure\CommentManager;
use Structure\LoginManager;
use Structure\PostManager;
use Structure\RegistrationManager;

function adminRegistration()
{
    //inscription qu'on laissera à disposition ou pas selon le client
    require 'view/backend/adminRegistration.php';
}
function checkRegistration($pseudo, $email, $email2, $password, $password2)
{
    //Vérification de pseudo, email et password
    $registrationManager = new \structure\RegistrationManager();
    $registration = $registrationManager->register($pseudo, $email, $email2, $password, $password2);

    if ($email == $email2 && $password == $password2) {
        echo 'inscription réussie';
        require 'view/backend/adminLogin.php';
    } else {
        throw new exception('Merci de revoir vos mots de passe ou emails');
    }
}
function adminLogin()
{
    //On utilise ici le système des sessions pour pour accéder à la page de login
    if (isset($_SESSION['pseudo']) && isset($_SESSION['password'])) {
        require 'view/backend/adminIndex.php';
    } else {
        require 'view/backend/adminLogin.php';
    }
}

function checkUser($email, $password)
{
//On controlera ici qu'on a le bon password et que tous les champs sont remplis
    $loginManager = new LoginManager();
    $member = $loginManager->login($email, $password);
    $isPasswordCorrect = password_verify($_POST['password'], $member['password']);

    if (!$member) {
        echo 'Mauvais identifiant ou mot de passe';
        require 'view/backend/adminLogin.php';
    } else {
        if ($isPasswordCorrect) {
            $_SESSION['pseudo'] = $member['pseudo'];
            $_SESSION['email'] = $member['email'];
            getSignaledComments();
        } else {
            echo 'Mauvais identifiant ou mot de passe !';
            require 'view/backend/adminLogin.php';
        }
    }
}
function getSignaledComments()
{
    $commentManager = new \Structure\CommentManager();
    $signaledComments = $commentManager->getSignaledComments();

    if ($signaledComments === false) {
        throw new Exception('aucun commentaire signalé');
    } else {
        require 'view/backend/adminIndex.php';
    }
}

function displaySignaledComment()
{
    $commentManager = new \Structure\CommentManager();
    $signaledComments = $commentManager->getSignaledComments();

    if ($signaledComments === false) {
        throw new Exception('aucun commentaire signalé');
    } else {
        require 'view/backend/adminIndexComment.php';
    }
}
function eraseComment($idComment)
{
    $commentManager = new CommentManager();
    $destroyComment = $commentManager->deleteComment($idComment);

    if ($destroyComment === false) {
        throw new Exception('commentaire non supprimé');
    } else {
        require 'view/backend/eraseComment.php';
    }
}
function saveComment($commentId)
{
    $commentManager = new CommentManager();
    $updateSignaledComment = $commentManager->retainComment($commentId);

    if ($updateSignaledComment === false) {
        throw new Exception('commentaire non sauvegardé');
    } else {
        require 'view/backend/saveComment.php';
    }
}
function postListing()
{
  //Sur cette vue on ne fera pas de pagination en faveur d'un scrollup
    $postManager = new PostManager();
    $nombredElementsTotal = $postManager->getAllPosts();
    require 'view/backend/adminCrud.php';
}

function erasePost($idComment, $idPost)
{
//Ici on peut supprimer un post ainsi que le commentaire qui lui est associé
    $postManager = new PostManager();
    $destroyPost = $postManager->deletePost($idComment, $idPost);

    if ($destroyPost === false) {
        throw new Exception('post non supprimé');
    } else {
        require 'view/backend/erasePost.php';
    }
}

function eraseJustPost($idPost)
{
    //Ici on ne supprime que le post
    $postManager = new PostManager();
    $destroyJustPost = $postManager->deleteJustPost($idPost);

    if ($destroyJustPost === false) {
        throw new Exception('Justpost non supprimé');
    } else {
        require 'view/backend/erasePost.php';
    }
}

function readPost($id)
{
    $postManager = new PostManager();
    $displayPost = $postManager->getPost($id);

    if ($displayPost === false) {
        throw new Exception('post non affiché');
    } else {
        require 'view/backend/readPost.php';
    }
}
function updatePost($id, $artist, $title, $albumName, $imageAlbum)
{
    $postManager = new PostManager();
    $postModified = $postManager->updatePost($id, $artist, $title, $albumName, $imageAlbum);

    if ($postModified === false) {
        throw new Exception('post non modifié');
    } else {
        require 'view/backend/updateInfo.php';
    }
}
function editPost($id)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($id);

    if ($post === false) {
        throw new exception('post inexistant');
    } else {
        require 'view/backend/editPost.php';
    }
}
function createPost()
{
    $postManager = new PostManager();
    $postAdded = $postManager->addPost();

    if ($postAdded === false) {
        throw new Exception('impossible d\ajouter le post!');
    } else {
        require 'view/backend/createPost.php';
    }
}
function sendPost($artist, $title, $albumName, $imageAlbum)
{
    $postManager = new PostManager();
    $forward = $postManager->postSender($artist, $title, $albumName, $imageAlbum);

    if ($forward === false) {
        throw new Exception('impossible d\envoyer le post!');
    } else {
        require 'view/backend/updateInfo.php';
    }
}
function adminLogout()
{
    $loginManager = new LoginManager();
    $disconnect = $loginManager->logout();

    header('Location: index.php?action=adminLogout');
}
