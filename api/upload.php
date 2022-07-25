<?php
include 'connection.php';

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $text = $_POST['text'];
    $images = $_FILES['images']['name'];
    $timestamp = date("d-m-Y", time());
    $countImages = count($images);
    $uploadOk = 1;

    //check if file exists && is a actual image
    for($i = 0; $i < $countImages; $i++) {
        $check = getimagesize($_FILES["images"]["tmp_name"][$i]);
        if($check !== false) {
            $imagePath = "../assets/" . $_FILES['images']['name'][$i];
            if(file_exists($imagePath)) {
                echo "Datei existiert bereits<br>";
                $uploadOk = 0;
            }
        } else {
            echo "Bitte nur Bilder hochladen<br>";
            $uploadOk = 0;
        }
    }

    if($uploadOk == 1){
        //upload images
        for($i = 0; $i < $countImages; $i++) {
            $imagePath = "../assets/" . $_FILES['images']['name'][$i];
            move_uploaded_file($_FILES['images']['tmp_name'][$i], $imagePath);
        }
    
        //insert data to posts table
        $statement = $pdo->prepare("INSERT INTO posts (title, description, text, upload) VALUES (:title, :description, :text, :timestamp)");
        $result = $statement->execute(array('title' => $title, 'description' => $description, 'text' => $text, 'timestamp' => $timestamp));

        $postid = $pdo->lastInsertId();
        
        //insert data to images table
        for($i = 0; $i < $countImages; $i++) {
            $path = 'assets/' . $_FILES['images']['name'][$i];
            $statement = $pdo->prepare("INSERT INTO images (postId, path) VALUES (:postId, :path)");
            $result = $statement->execute(array('postId' => $postid, 'path' => $path));
        }

        echo "Post erfolgreich hochgeladen<br>";
    }else {
        echo "Post konnte nicht hochgeladen werden<br>";
    }
}
?>
<button><a href="/index.php">Home</a></button>