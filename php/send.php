<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $first_name = htmlspecialchars($_POST['first_name']); // Используем htmlspecialchars для безопасности
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // Адрес, на который будет отправлено письмо
    $to = "ilya02989@gmail.com"; // Замените на ваш email

    // Тема письма
    $subject = "Новая запись на тренировку";

    // Текст письма
    $message = "Имя: $first_name\n";
    $message .= "Фамилия: $last_name\n";
    $message .= "Email: $email\n";
    $message .= "Телефон: $phone\n";

    // Заголовки письма
    $headers = "From: no-reply@example.com\r\n"; // Замените на ваш email или оставьте как есть
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
} else {
    echo "Некорректный запрос.";
}
?>