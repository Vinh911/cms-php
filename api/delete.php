<?php
    session_start();
    if(!isset($_SESSION['userid'])) {
        ob_start();
        header('Location: login.php');
        ob_end_flush();
        die();
    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Löschen</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="wrapper">
        <?php
            include('../navbar.php');

            include 'connection.php';

            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                echo 'Post ' . $id . 'wird gelöscht...<br>';
                $statement = $pdo->prepare('SELECT * FROM images WHERE postId = :id');
                $statement->execute(['id' => $id]);
                $images = $statement->fetchAll();
        
                foreach($images as $image) {
                    if(file_exists('../assets/' . $image['path'])) {
                        unlink('../assets/' . $image['path']);
                    }else {
                        echo $image['path'] . ' not found<br>';
                    }
                }
        
                $statement = $pdo->prepare('DELETE FROM images WHERE postId = :id');
                $statement->execute(['id' => $id]);
                $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');
                $statement->execute(['id' => $id]);
                echo 'Post ' . $id . ' gelöscht';
            }else {
                echo 'no post id';
            }
        ?>
    </div>
</body>
<?php include('../footer.php'); ?>

</html>