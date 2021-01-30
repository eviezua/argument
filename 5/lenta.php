<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News!</title>
    <link rel="stylesheet" type="text/css" href="lenta.css">
</head>
<body>
<?php
    $settings = require('../settings.php');
    $connection=mysqli_connect($settings['db']['server'], $settings['db']['user'], $settings['db']['password'], $settings['db']['database']);
	$connection->query("SET NAMES 'utf8' ");
	$posts=$connection->query("SELECT * FROM user_form ORDER BY publication_time DESC");
	$array=mysqli_fetch_assoc($posts);
	do{
		printf('<div><p><h2>%s<h2></p>
			<p><h4>%s<h4></p>
			<hr>
			<p><h2>%s<h2></p>
			<p><h2>%s<h2></p>
			<p><h2>%s<h2></p>
			<p><h2>%s<h2></p>
			<p><h2>%s<h2></p>
			<p><h2>%s<h2></p></div>', $array['nickname'], $array['publication_time'], $array['select1'], $array['select2'], $array['bookname'], $array['bookgenre'], $array['thems'], $array['user_text']);
	}
	while ($array=mysqli_fetch_assoc($posts));
?>
</body>
</html>