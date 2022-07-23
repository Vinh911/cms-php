<?php 
session_start();
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <p>This is the admin panel</p>
</body>
<?php include('footer.php'); ?>

</html>