<?php
session_start();
require_once 'php/db.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];

// Список доступных абонементов
$subscriptions = [
    ['name' => 'Пробная тренировка', 'quantity' => 1, 'price' => 'Бесплатно'],
    ['name' => 'Абонемент «2 занятия в неделю»', 'quantity' => 8, 'price' => '2200 ₽'],
    ['name' => 'Абонемент «3 занятия в неделю»', 'quantity' => 12, 'price' => '3300 ₽'],
    ['name' => 'Абонемент «4 занятия в неделю»', 'quantity' => 16, 'price' => '4400 ₽'],
    ['name' => 'Индивидуальная тренировка в группе до 4-х человек', 'quantity' => 1, 'price' => '800 ₽'],
    ['name' => 'Индивидуальный курс в группе до 4 человек', 'quantity' => 5, 'price' => '4000 ₽'],
    ['name' => 'Разовое занятие в сборном коллективе', 'quantity' => 1, 'price' => '400 ₽'],
];

// Сохранение абонемента в базу данных
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscription'])) {
    $selectedSubscription = $subscriptions[$_POST['subscription']];

    $stmt = $pdo->prepare('INSERT INTO subscriptions (user_id, name, quantity, price) VALUES (?, ?, ?, ?)');
    $stmt->execute([
        $user['id'],
        $selectedSubscription['name'],
        $selectedSubscription['quantity'],
        $selectedSubscription['price']
    ]);

    header('Location: account.php');
    exit;
}

// Удаление абонемента
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_subscription'])) {
    $subscriptionId = $_POST['delete_subscription'];

    $stmt = $pdo->prepare('DELETE FROM subscriptions WHERE id = ? AND user_id = ?');
    $stmt->execute([$subscriptionId, $user['id']]);

    header('Location: account.php');
    exit;
}

// Получение активных абонементов пользователя
$stmt = $pdo->prepare('SELECT * FROM subscriptions WHERE user_id = ? ORDER BY created_at DESC');
$stmt->execute([$user['id']]);
$userSubscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/account.css">
    <title>Аккаунт</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>Добро пожаловать, <?php echo htmlspecialchars($user['username']); ?>!</h1>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <div class="header__links">
                <a href="php/logout.php" class="button">Выйти</a>
                <a href="index.php" class="button">На главную</a>
            </div>
        </header>

        <main>
            <!-- Отображение активных абонементов -->
            <section class="current-subscription">
                <h2>Ваши абонементы</h2>
                <?php if ($userSubscriptions): ?>
                    <ul>
                        <?php foreach ($userSubscriptions as $subscription): ?>
                            <li>
                                <strong><?php echo htmlspecialchars($subscription['name']); ?></strong>
                                <p>Количество тренировок: <?php echo htmlspecialchars($subscription['quantity']); ?></p>
                                <p>Цена: <?php echo htmlspecialchars($subscription['price']); ?></p>
                                <p>Дата приобретения: <?php echo htmlspecialchars($subscription['created_at']); ?></p>
                                <form action="account.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="delete_subscription" value="<?php echo $subscription['id']; ?>">
                                    <button type="submit" class="button delete-button">Удалить</button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>У вас пока нет приобретенных абонементов.</p>
                <?php endif; ?>
            </section>

            <!-- Возможность приобрести абонемент -->
            <section class="purchase-subscription">
                <h2>Приобрести абонемент</h2>
                <form action="account.php" method="POST">
                    <select name="subscription" required>
                        <?php foreach ($subscriptions as $index => $subscription): ?>
                            <option value="<?php echo $index; ?>">
                                <?php echo htmlspecialchars($subscription['name']); ?> —
                                <?php echo htmlspecialchars($subscription['quantity']); ?> тренировок —
                                <?php echo htmlspecialchars($subscription['price']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="button">Купить</button>
                </form>
            </section>

            <section class="change-password">
                <h2>Смена пароля</h2>
                <form action="php/change_password.php" method="POST" class="form">
                    <input type="password" name="current_password" placeholder="Текущий пароль" required />
                    <input type="password" name="new_password" placeholder="Новый пароль" required />
                    <input type="password" name="confirm_password" placeholder="Подтвердите новый пароль" required />
                    <button type="submit" class="button">Изменить пароль</button>
                </form>
            </section>
        </main>
    </div>
</body>

</html>