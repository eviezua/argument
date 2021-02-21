<?php
session_start();
$settings = require('../settings.php');
$connection=mysqli_connect($settings['db']['server'], $settings['db']['user'], $settings['db']['password'], $settings['db']['database']);
$connection->query("SET NAMES 'utf8' ");

$postQuery = $connection->query("SELECT id, bookname, author FROM user_form ORDER BY RAND() LIMIT 1");
$post=mysqli_fetch_assoc($postQuery);
$id = $post['id'];
$name = $post['bookname'];
$answer = $post['author'];

$author = null;
if (isset($_POST['author'])) {
    $author = $_POST['author'];
    $id = $_POST['id'];
    $postQuery = $connection->query("SELECT id, bookname, author FROM user_form WHERE id = " . $id . " LIMIT 1");
    $post=mysqli_fetch_assoc($postQuery);
    $id = $post['id'];
    $name = $post['bookname'];
    $answer = $post['author'];
    $sim = similar_text($answer, $author, $perc);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game</title>
    <link rel="stylesheet" type="text/css" href="/7/game.css">
</head>
<body>
<div class="game">
    <h1>НАЗВА: <?php echo $name ?></h1>
    <h1>Автор/режесер:</h1>
    <form method="post" ondblclick="">
        <input name="author" type="text" autocomplete="off"<?php if (isset($_POST['author'])) echo ' value="' . $_POST["author"] . '"' ?> />
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" class="but2" value="Перевірити!" />
    </form>

    <?php if ($author) : ?>
    <h1>Співпадання: <?php echo $perc ?>% </h1>
    <h1>Правильна відповідь: <?php echo $answer ?></h1>
    <button class="but1">Далі!</button>
    <button class="but1">Стоп</button>
    <?php endif; ?>
</div>
</body>
</html>
