<?php
// Получаем текст ошибки из URL параметра
$error_message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'Произошла непредвиденная ошибка.';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .error-container {
            text-align: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .error-container h1 {
            color: #e74c3c;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .error-container p {
            color: #333;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .error-container a {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <div class="error-container">
        <h1>Ошибка!</h1>
        <p><?php echo $error_message; ?></p>
        <a href="index.php">Вернуться на главную</a>
    </div>

</body>

</html>