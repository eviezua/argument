<?php
    $settings = require('../settings.php');
    $connection=mysqli_connect($settings['db']['server'], $settings['db']['user'], $settings['db']['password'], $settings['db']['database']);
	$connection->query("SET NAMES 'utf8' ");
	if (isset($_POST['text_field'])){
		$username=$_POST['username'];
		$text=$_POST['text_field'];
		$themes=$_POST['new_text'];
		$bookname=$_POST['name'];
		$genre=$_POST['genre'];
		$select2=$_POST['lifes'];
		$select1=$_POST['type'];
		$date=date('Y-m-d H:i:s');
		if (isset($username)=='FALSE') {
			$username="Anonymous";
		}
		if ($select1=='miste') {
			$select1="Приклад з мистецтва";
		}
		elseif ($select1=='life') {
			$select1="Приклад з життя";
			if($select2=='vlasn'){
				$select2="власного";
			}
			if($select2=='osoba'){
				$select2="історичної особи";
			}
		}
		$query=$connection->query("INSERT INTO user_form (nickname, select1, thems, user_text, select2, 
                       bookname, bookgenre, publication_time) VALUES ('$username', '$select1', '$themes', '$text', '$select2', '$bookname', '$genre', '$date')");
	}
 ?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="new_example_list.css">
  <title>New example</title>
 </head>
 <body>
 	<form method="POST">
 	<fieldset>
 		<center><input type="text" name="username" placeholder="Ваш нікнейм: " class="text1"></center>
 			<fieldset>
 				<legend class="text2">Ваш приклад з: </legend>
 				<left><p><input type="radio" name="type" id="miste" value="miste"><a class="text2">Творів мистецтва</a></p></left>
 				<left><p><input type="radio" name="type" id="lifee" value="life"><a class="text2">Життя</a></p></left>
 				<left><p><input type="button" onclick="quest1()" class="but" value="Вибрати"></p></left>
 			</fieldset>
 			<fieldset id="lifestory">
 				<legend class="text2">Ваш приклад з: </legend>
 				<left><p><input type="radio" name="lifes" id="vlasn" value="vlasn"><a class="text2">Власного життя</a></p></left>
 				<left><p><input type="radio" name="lifes" id="osoba" value="osoba"><a class="text2">Життя видатної особи</a></p></left>
 			</fieldset>
 			<fieldset id="mistestvo">
 				<legend class="text2">Для прикладу з творів мистецтва</legend>
 				<center><input type="text" name="name" placeholder="Назва: " class="text1"></center>
 				<center><input type="text" name="genre" placeholder="Жанр: " class="text1"></center>
                <center><input type="text" name="genre" placeholder="Автор:(Приклад: Тарас Григорович Шевченко) " class="text1"></center>
 			</fieldset>
 			 	<p><center><textarea type="text" name="text_field" placeholder="Ваш приклад: " cols="200" rows="10" class="text1"></textarea></center></p>
 		<center><input type="text" id="tags" placeholder="Теми: " class="text1"></center>
 		<right><p><input type="button" onclick="tag_add()" class="but" value="Додати теми"></p></right>
 		<fieldset>
 			<ul class="search_tags">
 				<li><input type="checkbox" name="tag_result" value="lorem">lorem</li>
 				<li><input type="checkbox" name="tag_result" value="l">l</li>
 				<li><input type="checkbox" name="tag_result" value="ipsum">ipsum</li>
 				<li><input type="checkbox" name="tag_result" value="l214q3456789">214q3456789</li>
 				<li><input type="checkbox" name="tag_result" value="2020">2020</li>
 				<li><input type="checkbox" name="tag_result" value="0!">0!</li>
 				<li><input type="checkbox" name="tag_result" value="!%$%@@">!%$%@@</li>
 			</ul>
 		</fieldset>
 		<fieldset id="themes" >
 			<legend class="text2" id="1">Ваші теми: </legend>
 		</fieldset>
 		<button type="submit" class="but" onclick="send_form()">Зберегти</button>
 	</fieldset>
    </form>
 	<script src="new_example_list.js"></script>
 </body>
</html>