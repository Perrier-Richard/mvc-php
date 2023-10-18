<?php
    require_once('src/controllers/homepage.php');
    require_once('src/controllers/post.php');

    try{
        if (isset($_GET['action']) && $_GET['action'] !== '') {
            if ($_GET['action'] === 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $identifier = $_GET['id'];
                    post($identifier);
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                    die;
                }
            } elseif ($_GET['action'] === 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $identifier = $_GET['id'];
                    addComment($identifier, $_POST);
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                    die;
                }
            } else {
                echo "Erreur 404 : la page que vous recherchez n'existe pas.";
            }
        } else {
            homepage();
        }
    } catch (Exception $e) { // S'il y a eu une erreur, alors...
        $errorMessage = $e->getMessage();
        require('templates/error.php');
    }
