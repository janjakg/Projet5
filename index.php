<?php
require 'controller/frontend.php';
require 'controller/backend.php';
try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
//accès à la page d'accueil
            case 'listPosts':
                listPosts();
                break;
//accès au titre choisi par l'utilisateur
            case 'post':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
                break;
//l'utilisateur peut faire un commentaire à propos d'un post
            case 'addComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        echo 'Erreur : tous les champs ne sont pas remplis !';
                    }
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
                break;
//l'utilisateur peut signaler le commentaire d'un autre utilisateur
            case 'signalledComment':
                if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                    signalledComment($_GET['idComment']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
                break;
//page réservée pour l'inscription
            case 'adminRegistration':
                adminRegistration();
                break;
//Pour valider l'incription, que tous les champs soient remplis, et que les mots de passe et emails soient concordants
            case 'checkRegistration':
                if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['email2']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
                    checkRegistration($_POST['pseudo'], $_POST['email'], !empty($_POST['email2']), $_POST['password'], !empty($_POST['password2']));
                } else {
                    echo 'vous devez vraiment remplir tous les champs!';
                }
                break;
//Avec cette condition si la session est commencée il ne sera pas nécessaire que le script nous amène sur la page de login
            case 'adminLogin':
                if (isset($_SESSION['pseudo'])) {
                    header('Location:index.php?action=adminIndex');
                } else {
                    adminLogin();
                }
                break;
//Vérification du login
            case 'checkUser':
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    checkUser($_POST['email'], $_POST['password']);
                } else {
                    echo 'vous devez remplir tous les champs!';
                    require 'view/backend/adminLogin.php';
                }
                break;
//accès au Dashboard(tableau de bord)
            case 'adminIndex':
                getSignaledComments();
                break;
//accès à la liste des commentaires signalés
            case 'adminIndexComment':
                displaySignaledComment();
                break;
//suppression des commentaires
            case 'eraseComment':
                if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                    eraseComment($_GET['idComment']);
                } else {
                    throw new Exception(' aucun identifiant de commentaire effacé');
                }
                break;
            //Nous sauvegardons le commentaire
            case 'saveComment':
                if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                    saveComment($_GET['commentId']);
                } else {
                    throw new Exception('aucun identifiant de commentaire sauvegardé');
                }
                break;
//accès à la liste des posts(titres)
            case 'adminCrud':
                postListing();
                break;
//on peut ici supprimer les posts (titres) que l'on ne valide pas
            case 'erasePost':
                if (isset($_GET['idPost']) && isset($_GET['idComment']) && $_GET['idPost'] > 0) {
                    erasePost($_GET['idPost'], $_GET['idComment']);
                    eraseJustPost($_GET['idPost']);
                } else {
                    throw new Exception('aucun identifiant de post supprimé');
                }
                break;
//on peut ici lire un post(titre) que l'on vient de choisir
            case 'readPost':
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    readPost($_GET['postId']);
                } else {
                    throw new Exception('aucun identifiant d\'article renseigné');
                }
                break;
//titre que l'on voudrait modifier
            case 'editPost':
                editPost($_GET['idPost']);
                break;
//Nous procédons ici à la mise à jour
            case 'updatePost':
                if (!empty($_POST['artist']) && !empty($_POST['title'])) {
                    updatePost($_GET['idPost'], addslashes(strip_tags($_POST['artist'])), addslashes(strip_tags($_POST['title'])), addslashes(strip_tags($_POST['albumName'])), addslashes(strip_tags($_POST['imageAlbum'])));
                } else {
                    throw new Exception('Aucun post updated');
                }
                break;
            //Nous accédons à la page de création de post
            case 'createPost':
                createPost();
                break;
//Nous envoyons le post
            case 'sendPost':
                if (!empty($_POST['artist']) && !empty($_POST['title']) && !empty($_POST['albumName']) && !empty($_POST['imageAlbum'])) {
                    sendPost(addslashes(strip_tags($_POST['artist'])), addslashes(strip_tags($_POST['title'])), addslashes(strip_tags($_POST['albumName'])), addslashes(strip_tags($_POST['imageAlbum'])));
                } else {
                    throw new Exception('Merci de créez votre poste');
                }
                break;
//Nous pouvons quitter la session et maintenant il faudra à nouveau se logger pour naviguer dans le backend
            case 'adminLogout':
                if (isset($_SESSION['pseudo'])) {
                    $_SESSION = array();
                    session_destroy();
                    header('Location: index.php?action=adminLogin');
                    echo 'session terminée';
                } else {
                    throw new exception('logout non fonctionnel');
                }
                break;
           
            default:
                echo 'Pas d\'action';
                break;
        }
    } else {
        listPosts();

    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
