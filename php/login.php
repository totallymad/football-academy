<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        header('Location: ../error.php?error=' . urlencode('Пожалуйста, заполните все поля.'));
        exit;
    }

    // Проверка пользователя в базе данных
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Успешная авторизация
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
        ];
        header('Location: ../account.php');
        exit;
    } else {
        header('Location: ../error.php?error=' . urlencode('Неверный логин или пароль.'));
        exit;
    }
}
?>




