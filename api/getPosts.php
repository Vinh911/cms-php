<?php
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
        include 'connection.php';
        $statement = $pdo->query("SELECT * FROM posts ORDER BY id DESC");
        $posts = $statement->fetchAll();
        $result = [];
        foreach($posts as $post) {
            $statement = $pdo -> query("SELECT * FROM images WHERE postId = " . $post['id']);
            $images = $statement->fetchAll();
            $tmpImages = [];
            foreach($images as $image) {
                array_push($tmpImages, $image['path']);
            }

            $res = array(
                'id' => $post['id'],
                'title' => $post['title'],
                'description' => $post['description'],
                'text' => $post['text'],
                'upload' => $post['upload'],
                'images' => $tmpImages
            );
            array_push($result, $res);
        }

        echo json_encode($result, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>