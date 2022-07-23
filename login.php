<?php 
session_start();

include 'api/connection.php';

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        header('Location: index.php');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form class="loginForm" action="?login=1" method="post">
        <h2>Login</h2>
        E-Mail:<br>
        <input type="email" size="40" maxlength="250" name="email"><br><br>

        Dein Passwort:<br>
        <input type="password" size="40" maxlength="250" name="passwort"><br>
        <p>
            <?php 
                if(isset($errorMessage)) {
                    echo $errorMessage;
                }
            ?>
        </p>
        <input type="submit" value="Abschicken">
    </form>
</body>
<?php include('footer.php'); ?>

</html>