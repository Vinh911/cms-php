<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
include 'api/connection.php';

$statement = $pdo->query('SELECT * FROM posts');
$posts = $statement->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bearbeiten</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
        include('navbar.php');
        foreach($posts as $post) {
            echo '<div class="post">';
            echo '<h2>' . $post['title'] . '</h2>';
            echo '<p>' . $post['text'] . '</p>';
            echo '<p>' . $post['description'] . '</p>';
            echo '<a href="edit.php?id=' . $post['id'] . '">Bearbeiten</a>';
            echo '<a href="api/delete.php?id=' . $post['id'] . '">Löschen</a>';
            echo '</div>';
        }
    ?>

</body>
<?php include('footer.php'); ?>

</html>