<?php
$username = 'root';
$password = 'burek123';
$server = '127.0.0.1';
$db_name = 'phpexcelltest';

$link = mysqli_connect($server, $username, $password, $db_name)or die(mysqli_error($link));
//uft8 and php driver error fix
mysqli_query($link, "SET NAMES 'UTF8'");
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);}

?>