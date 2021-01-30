<?php
    $settings = require('../settings.php');
    $connection=mysqli_connect($settings['db']['server'], $settings['db']['user'], $settings['db']['password'], $settings['db']['database']);
    $connection->query("SET NAMES 'utf8' ");
    if (isset($_POST['login']) and isset($_POST['password'])) {
        $login= $_POST['login'];
        $email= $_POST['email'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $active=1;
        $query= $connection->query("INSERT INTO users (login, email, password, active) VALUES ('$login', '$email', '$password', '$active')");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <form class="sign-in" method="POST">
            <h2>Реєстрація</h2>
            <?php if (isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg; ?></div> <?php } ?>
            <?php if (isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div> <?php } ?>
            <p><input type="text" name="login" class="form-control" placeholder="Ваш логін" required></p>
            <p><input type="text" name="email" class="form-control" placeholder="Ваш e-mail" required><p>
            <p><input type="password" name="password" class="form-control" placeholder="Ваш пароль" required><p>
            <p><button class="btn" type="submit">Зареєструватися</button><p>
        </form>
    </div>
</body>
</html>