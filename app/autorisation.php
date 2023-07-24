<?php
// Стартуем сессию
session_start();

$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = ''; //пароль, по умолчанию пустой
$db = 'sf25'; //имя базы данных

// Подключаемся к БД

$dbConnect = new PDO("mysql:host=$host;dbname=$db", $user, $password);
try {
	$db = new PDO("mysql:host=$host;dbname=$db", $user, $password);
} catch (PDOException $e) {
	die($e->getMessage());
}
//$result = $dbConnect->exec($sql);
$sql = "SELECT * FROM users";
$result = $dbConnect->query($sql);
$stmt = $dbConnect->query($sql);
$resultDB = $stmt->FETCH(PDO::FETCH_ASSOC);


// echo "<pre>";
// var_dump($resultDB);
// echo "</pre>";

// echo "<pre>";
// var_dump($resultDB['name']);
// echo "</pre>";

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";



if (!empty($_POST['password']) && !empty($_POST['login'])) {
    // echo 'Логи и пароль не пустые';
    $passHash = md5($_POST['password']);
    if ($resultDB['password'] === $passHash && $resultDB['name'] === $_POST['login'] ) {

        //$login = $resultDB['name'];
        $_SESSION['auth'] = $resultDB['name'];

    }
}

?>