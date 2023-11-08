<?php

require_once('src/model/comment.php');

function updateComment(string $post, array $input)
{
    $comment = null;
    if (!empty($input['comment'])) {
        $comment = $input['comment'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }

    $success = changeComment($post, $comment);
    if (!$success) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php');
    }
}
