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
    <title>Admin Panel</title>
</head>

<body>
    <?php include('navbar.php'); ?>
    <p>This is the admin panel</p>
</body>
<?php include('footer.php'); ?>

</html>