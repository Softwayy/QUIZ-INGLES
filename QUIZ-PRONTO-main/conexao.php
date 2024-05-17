<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ingles';

$mysql = new mysqli($host, $user, $password, $db);

if ($mysql->connect_error) {
    die('Connection failed: ' . $mysql->connect_error);
}
?>
