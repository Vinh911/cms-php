<?php
session_start();
if(!isset($_SESSION['userid'])) {
    ob_start();
    header('Location: login.php');
    ob_end_flush();
    die();
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
    ?>
    <div class="edit">
        <div class="post">
            <p>Post insgesamt: <?php echo count($posts); ?></p>
        </div>
        <?php
            foreach($posts as $post) {
                echo '<div class="post">';
                echo '<h2>' . $post['title'] . '</h2>';
                echo '<form action="api/delete.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $post['id'] . '">';
                echo '<input type="submit" value="Delete">';
                echo '</form>';
                echo '</div>';
            }
        ?>
    </div>
</body>
<?php include('footer.php'); ?>

</html>