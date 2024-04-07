<?php



$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'moji';

define("BASE_URL", "http://localhost");

define("ADMIN_URL", BASE_URL . "/admin");

try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
	echo "Connection error :" . $exception->getMessage();
}

?>