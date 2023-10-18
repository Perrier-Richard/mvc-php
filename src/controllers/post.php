<?php
    // src/controllers/post.php
    function post(string $identifier) {
        $post = getPost($identifier);
        $comments = getComments($identifier);
        require('templates/post.php');
    }