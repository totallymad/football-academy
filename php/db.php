<?php
// db.php
// $host = 'localhost';  // Хост сервера MySQL
// $db = 'ilya02a0_footbal';  // Название базы данных
// $user = 'ilya02a0_footbal';  // Пользователь базы данных
// $password = 'Flvby123!';  // Пароль пользователя

$host = 'localhost';  // Хост сервера MySQL
$db = 'football_academy';  // Название базы данных
$user = 'root';  // Пользователь базы данных
$password = '';  // Пароль пользователя

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>