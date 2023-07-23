<?php
// Стартуем сессию
session_start();


$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = ''; //пароль, по умолчанию пустой
$db = 'sf25'; //имя базы данных

// Подключаемся к БД
$db = new PDO("mysql:host=$host;dbname=$db", $user, $password);


define('URL', ''); // URL текущей страницы
define('UPLOAD_MAX_SIZE', 1000000); // 1mb
define('ALLOWED_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
define('UPLOAD_DIR', 'uploads');
define('COMMENT_DIR', 'comments');

require_once 'app/file_load.php';
