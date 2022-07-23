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
    <title>Upload</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <form class="uploadForm" action="api/upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Titel:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Beschreibung:</label><br>
        <input type="text" id="description" name="description" required><br>
        <label for="text">Text:</label><br>
        <textarea id="text" name="text" required></textarea><br>
        <label for="images">Bilder:</label><br>
        <input type="file" id="images" name="images[]" multiple required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
<?php include('footer.php'); ?>

</html>