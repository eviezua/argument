<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Зворотній зв'язок</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<h1>Зворотній зв'язок</h1>
<form action="form.php" method="post">
    <fieldset>
        <legend>Ваше повідомлення:</legend>
        Ваше ім'я:
        <input type="text" name="name" autocomplete="off"><br>
        E-mail:
        <input type="text" name="email" autocomplete="off"><br>
        Повідомлення:
        <textarea rows="10" cols="45" name="message" autocomplete="off"></textarea><br>
        <input type="submit" value="Відправити">
    </fieldset>
</form>
</body>
</html>
<?php
$to = "eviezua@gmail.com";
$tema = "Зворотній зв'язок";
$message = "Ім'я: " . $_POST['name'] . "<br>";
$message .= "E-mail: " . $_POST['email'] . "<br>";
$message .= "Повідомлення: " . $_POST['message'] . "<br>";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $tema, $message, $headers);
?>