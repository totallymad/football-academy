<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user']['id'];
    $currentPassword = trim($_POST['current_password']);
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        die("Все поля должны быть заполнены.");
    }

    if ($newPassword !== $confirmPassword) {
        die("Новый пароль и подтверждение пароля не совпадают.");
    }

    // Проверяем текущий пароль
    $stmt = $pdo->prepare("SELECT password FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($currentPassword, $user['password'])) {
        die("Текущий пароль введен неверно.");
    }

    // Хэшируем новый пароль и обновляем в базе данных
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
    $stmt->execute(['password' => $newPasswordHash, 'id' => $userId]);

    echo "Пароль успешно изменен.";
    header('Location: ../account.php');
    exit;
}
?>