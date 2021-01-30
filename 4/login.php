<?php
    session_start();
    $settings = require('../settings.php');
    $connection=mysqli_connect($settings['db']['server'], $settings['db']['user'], $settings['db']['password'], $settings['db']['database']);
    $connection->query("SET NAMES 'utf8' ");
    if (isset($_POST['login']) and isset($_POST['password'])) {
        $login= $_POST['login'];
        $active=1;
        $query="SELECT u.id, u.login, u.password FROM `users` as u WHERE u.login = '" . $login . "'";
        $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
        $count=mysqli_num_rows($result);
        $row = $result->fetch_array();

        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['login'] = $login;
        } else {
            $fmsg='Помилка!';
        }
        if (isset($_SESSION['login'])) {
            $login=$_SESSION['login'];
            echo sprintf("Привіт, %s!", $login);
            echo "<a href='logout.php'>Вийти</a>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="container">
        <form class="log-in" method="POST">
            <h2>Вхід</h2>
            <p><input type="text" name="login" class="form-control" placeholder="Ваш логін" required></p>
            <p><input type="password" name="password" class="form-control" placeholder="Ваш пароль" required><p>
            <p><button class="btn" type="submit">Увійти</button><p>
        </form>
    </div>
</body>
</html>