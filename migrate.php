<?php
$settings = require('settings.php');
$connection=mysqli_connect($settings['db']['server'], $settings['db']['user'], $settings['db']['password'], $settings['db']['database']);
$connection->query("SET NAMES 'utf8' ");
$query="SELECT u.id, u.password FROM `users` as u WHERE u.migrated = 0";
$result= mysqli_query($connection, $query) or die(mysqli_error($connection));
$count=mysqli_num_rows($result);
var_dump($count);
while ($row = $result->fetch_array()) {
    var_dump($row);
    $id = $row['id'];
    $password= password_hash($row['password'], PASSWORD_DEFAULT);
    echo $password;
    $sql = "UPDATE `users` as u SET u.password = '$password', u.migrated = 1 WHERE u.id = $id";
    var_dump($sql);
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}