<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 
echo "Hallo User: ".$userid;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
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
    <button onclick="window.location.href='logout.php'">Logout</button>
</body>

</html>