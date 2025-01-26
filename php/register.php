<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password)) {
        header('Location: ../error.php?error=' . urlencode('Пожалуйста, заполните все поля.'));
        exit;
    }

    // Проверка на существование пользователя
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    if ($stmt->fetchColumn() > 0) {
        header('Location: ../error.php?error=' . urlencode('Пользователь с таким логином или email уже существует.'));
        exit;
    }

    // Хеширование пароля
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Вставка данных в таблицу
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword,
    ]);

    // После успешной регистрации перенаправляем на главную страницу
    header('Location: ../index.php');
    exit;
}
?>




