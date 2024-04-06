<?php

ini_set('error_reporting', E_ALL);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'moji';

define("BASE_URL", "http://localhost/moji");

define("ADMIN_URL", BASE_URL . "admin" . "/");

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
	echo "Connection error :" . $exception->getMessage();
}

?>