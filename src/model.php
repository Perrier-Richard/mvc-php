<?php

    function getPosts(){
        // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die( 'Erreur : '.$e->getMessage()   );
        }

        // On récupère les 5 derniers billets
        $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
        $posts = [];
        while ($row = $req->fetch()){
            $post = [
            'title' => $row['titre'],
            'content' => $row['contenu'],
            'frenchCreationDate' => $row['date_creation_fr'],
            ];

            $posts[] = $post;
        }
        $req->closeCursor();

        return $posts;
    }
?>