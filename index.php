<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="css/style.css" />
    <script defer src="js/script.js"></script>
    <title>Academy</title>
</head>

<body>


    <header>
        <div class="container">
            <div class="header">
                <div class="header__logo">
                    <img src="img/logo.png" alt="logo" />
                </div>
                <nav>
                    <ul>
                        <li><a href="#about">О школе</a></li>
                        <li><a href="#coaches">Тренеры</a></li>
                        <li><a href="#schedule">Расписание</a></li>
                        <li><a href="#pricelist">Цены</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                    </ul>
                </nav>
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="header__user">
                        <a class="header__user_link" href="account.php">Привет,
                            <?= htmlspecialchars($_SESSION['user']['username']) ?>!</a>
                        <a href="php/logout.php" class="header__logout">Выйти</a>
                    </div>
                <?php else: ?>
                    <button id="modal-button">Вход/Регистрация</button>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!isset($_SESSION['user'])): ?>
            <div id="modal" class="modal">
                <div class="modal__content">
                    <span id="close-modal" class="modal__close">&times;</span>
                    <div class="modal__tabs">
                        <button id="login-tab" class="modal__tab active">Вход</button>
                        <button id="register-tab" class="modal__tab">Регистрация</button>
                    </div>
                    <div id="login-form" class="modal__form active">
                        <h2>Вход</h2>
                        <form action="php/login.php" method="POST">
                            <input class="modal__input" type="text" name="username" placeholder="Логин" required />
                            <input class="modal__input" type="password" name="password" placeholder="Пароль" required />
                            <button type="submit" class="modal__button">Войти</button>
                        </form>
                    </div>
                    <div id="register-form" class="modal__form">
                        <h2>Регистрация</h2>
                        <form action="php/register.php" method="POST">
                            <input class="modal__input" type="text" name="username" placeholder="Логин" required />
                            <input class="modal__input" type="email" name="email" placeholder="Email" required />
                            <input class="modal__input" type="password" name="password" placeholder="Пароль" required />
                            <button type="submit" class="modal__button">Зарегистрироваться</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </header>

    <main>
        <section class="hero">
            <div class="hero__content">
                <h1>
                    Детская академия <br />
                    футбола валерия <br />
                    кечинова
                </h1>
                <p>Ведется набор от 5 до 15 лет.</p>
                <p>Пробная тренировка бесплатно.</p>
                <button>Записаться</button>
            </div>
        </section>

        <section id="about" class="about">
            <div class="about__shape top"></div>
            <div class="about__features">
                <div class="about__card">
                    <img src="img/football_ball.svg" alt="изображение мяча" />
                    <div class="about__card_text">
                        <h3>Тренерский состав</h3>
                        <p>
                            Квалифицированный тренерский штаб нашей футбольной школы имеет
                            не только спортивное, но и педагогическое образование
                        </p>
                    </div>
                </div>
                <div class="about__card">
                    <img src="img/football_camo.svg" alt="иконка лагеря" />
                    <div class="about__card_text">
                        <h3>Футбольные сборы и лагеря</h3>
                        <p>
                            Школа футбола «Академия спорта» регулярно проводит клубные
                            футбольные сборы .Также работает летний лагерь
                        </p>
                    </div>
                </div>
                <div class="about__card">
                    <img src="img/journall.svg" alt="иконка журнала" />
                    <div class="about__card_text">
                        <h3>Индивидуальные тренировки</h3>
                        <p>
                            Специалисты нашей детской школы футбола с удовольствием помогут
                            каждому улучшить технические навыки индивидуально
                        </p>
                    </div>
                </div>
            </div>

            <h2 class="about__title">О школе</h2>
            <p class="about__text">
                Футбол которому обучает академия основывается на двух правилах:
                своевременный умный дриблинг, точный и удобный пас.
            </p>
            <div class="about__info">
                <div class="about__rect"></div>
                <div class="about__rect small"></div>

                <img src="img/about_image.jpg" alt="about" />
                <div class="about__info_text">
                    <p>
                        В тренировочном процессе футболистов используются самые
                        разнообразные средства и методы, с помощью которых
                        совершенствуются основные физические качества и
                        технико-тактическое мастерство спортсменов:
                    </p>
                    <ul>
                        <li>-развитие точности удара;</li>
                        <li>-развитие быстроты;</li>
                        <li>-развитие силы и скоростно-силовых качеств;</li>
                        <li>-развитие общей выносливости.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="coaches" class="coaches">
            <h2>Наши тренеры</h2>
            <div class="coaches__cards">
                <div class="coaches__rect"></div>

                <div class="coaches__card">
                    <img src="img/coach1.png" alt="coach" />
                    <h3>Куваев Дмитрий Анатольевич</h3>
                    <p>Кандидат в мастера спорта.</p>
                    <p>
                        Игровая карьера - ФК "Булат", ФК "Локомотив" (СПБ), ФК "Газовик",
                        ФК "Уралмаш", ФК "Камаз", ФК "Северсталь", ФК "Спартак" (КС) с
                        1992 по 2004 гг.
                    </p>
                    <p>
                        Образование: Оренбургский Государственный Университет
                        (Тренер-преподаватель). "Центр по подготовке детско-юношеских
                        тренеров по футболу имени К. И. Бескова" (Программа
                        профессиональной переподготовки "Тренер по футболу")
                    </p>
                    <p>Набор детей в возрасте от 5 до 6 и от 9 до 10.</p>
                </div>
                <div class="coaches__card">
                    <img src="img/coach2.png" alt="coach" />
                    <h3>Антонов Алексей Сергеевич</h3>
                    <p>Кандидат в мастера спорта.</p>
                    <p>
                        Игровая карьера - ФК "Северсталь", ФК "Аппатит", ФК
                        "Череповец"./p>
                    </p>
                    <p>
                        Образование: Череповецкий Государственный Университет
                        (Тренер-преподаватель), ИНЖЭКОН (Менеджмент физической культуры и
                        спорта).
                    </p>
                    <p>Тренерская лицензия категории "С".</p>
                    <p>С 2009 года детский тренер.</p>
                </div>
            </div>
        </section>

        <section class="founder">
            <h2>Основатель Академии</h2>

            <div class="founder__card">
                <div class="founder__rect"></div>
                <div class="founder__rect-left"></div>
                <div class="founder__rect-small"></div>
                <div class="founder__rect-small-left"></div>
                <img src="img/main_teacher.png" alt="main coach" />
                <h3>Кечинов Валерий Викторович</h3>
                <p>Чемпион России по футболу: 1993, 1994, 1996, 1997, 1999, 2000</p>
                <p>Обладатель кубка по футболу: 1993/94</p>
                <p>Тренерская лицензия категории “А”</p>
                <p>
                    Формирование стратегии развития академии в соответствии с
                    тенденциями развития современного футбола.
                </p>
                <p>
                    Отбор и развитие перспективных футболистов старшего детского
                    возраста, создание условий для их перехода во взрослый футбол.
                </p>
            </div>
        </section>

        <section id="schedule" class="schedule">
            <h2>Расписание тренировок</h2>
            <div class="schedule__grid">
                <div class="schedule__grid_1">
                    <span>U-6 (2018/2019) - 2 ГРУППЫ: </span>
                    ВТОРНИК 10:00–19:00 <br />
                    ПЯТНИЦА 18:00–19:00
                </div>
                <div class="schedule__grid_2">
                    <span>U-8 (2016/2017) - 3 ГРУППЫ: 1 ГРУППА:</span>
                    ВТОРНИК, СРЕДА, ПЯТНИЦА 15:00
                    <span>2 ГРУППА:</span> ПОНЕДЕЛЬНИК, СРЕДА, ЧЕТВЕРГ 19:00
                    <span>3 ГРУППА:</span>
                    ВТОРНИК, ПЯТНИЦА 19:00
                </div>
                <div class="schedule__grid_3">
                    <span>U-10 (2014/2015) - 3 ГРУППЫ: 1 ГРУППА:</span> ПОНЕДЕЛЬНИК,
                    ВТОРНИК, ЧЕТВЕРГ 15:00 СУББОТА 09:00
                    <span>2 ГРУППА:</span> ПОНЕДЕЛЬНИК, ЧЕТВЕРГ 16:30 СРЕДА 10:00
                    ПЯТНИЦА 15:00 <span>3 ГРУППА:</span> ПОНЕДЕЛЬНИК, ЧЕТВЕРГ 10:30
                    СРЕДА 16:00
                </div>
                <div class="schedule__grid_4">
                    <img src="img/logo_big.png" alt="logo" />
                </div>
                <div class="schedule__grid_5">
                    <span>УТРЕННЯЯ ГРУППА:</span> 9:30 ПОНЕДЕЛЬНИК, СРЕДА, ПЯТНИЦА
                    <br />
                    8:00 ПОНЕДЕЛЬНИК, СРЕДА, ПЯТНИЦА
                </div>
                <div class="schedule__grid_6">
                    <span>НАЧАЛКА (2019/2020) - 2 ГРУППЫ:</span> ПОНЕДЕЛЬНИК, ЧЕТВЕРГ
                    18:00 <br />
                    ПОНЕДЕЛЬНИК, ЧЕТВЕРГ 19:00
                </div>
                <div class="schedule__grid_7">
                    <span>U-12 (2012/2013) - 3 ГРУППЫ: 1 ГРУППА:</span> ПОНЕДЕЛЬНИК,
                    ВТОРНИК 16:00 <br />
                    ЧЕТВЕРГ, ПЯТНИЦА 16:00 <span>2 ГРУППА:</span> ПОНЕДЕЛЬНИК, ВТОРНИК,
                    ЧЕТВЕРГ 17:30
                    <span>3 ГРУППА:</span>
                    СРЕДА, ПЯТНИЦА 17:30
                </div>
                <div class="schedule__grid_8">
                    <span>МОЛОДЁЖКА (2008–2011):</span> ПОНЕДЕЛЬНИК, ЧЕТВЕРГ 18:00
                    <br />
                    ВТОРНИК, ПЯТНИЦА 16:30
                </div>
            </div>
        </section>

        <section id="pricelist" class="subscription">
            <h2>Цены на абонемент</h2>
            <div class="subscription__wrapper">
                <table class="subscription__table">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Количество тренировок</th>
                            <th>Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table__row">
                            <td class="table__name">Пробная тренировка</td>
                            <td class="table__quantity">1</td>
                            <td class="table__price">Бесплатно</td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__name">Абонемент «2 занятия в неделю»</td>
                            <td class="table__quantity">8</td>
                            <td class="table__price">2200 ₽</td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__name">Абонемент «3 занятия в неделю»</td>
                            <td class="table__quantity">12</td>
                            <td class="table__price">3300 ₽</td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__name">Абонемент «4 занятия в неделю»</td>
                            <td class="table__quantity">16</td>
                            <td class="table__price">4400 ₽</td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__name">Индивидуальная тренировка в группе до 4-х человек</td>
                            <td class="table__quantity">1</td>
                            <td class="table__price">800 ₽</td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__name">Индивидуальный курс в группе до 4 человек</td>
                            <td class="table__quantity">5</td>
                            <td class="table__price">4000 ₽</td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__name">Разовое занятие в сборном коллективе</td>
                            <td class="table__quantity">1</td>
                            <td class="table__price">400 ₽</td>
                        </tr>
                    </tbody>
                </table>
                <div class="subscription__img">
                    <img src="img/price_list_photo.png" alt="price list" />
                    <p>
                        * - ДЛЯ МОЛОДЫХ ФУТБОЛИСТОВ АКАДЕМИИ СКИДКА 50%; 25% СКИДКА НА
                        ВТОРОГО РЕБЕНКА, ЗАНИМАЮЩЕГОСЯ В АКАДЕМИИ;
                    </p>
                    <p>25% СКИДКА МНОГОДЕТНЫМ СЕМЬЯМ</p>
                </div>
            </div>
            <p class="subscription__subtitle">
                «2 занятия в неделю» - 5-8 тренировок в месяц, «3 занятия  в неделю» -
                9-12 тренировок в месяц, «4 занятия в неделю» -13 -16 тренировок в
                месяц.
            </p>
        </section>

        <section class="form">
            <div class="red-shape top"></div>
            <div class="red-shape bottom"></div>
            <div class="form__wrapper">
                <img src="img/football-boy.png" alt="мальичк футболист" class="form__img" />
                <form action="#" method="post">
                    <h2>Запишись сейчас на первую бесплатную тренировку</h2>

                    <div class="form__group">
                        <label>
                            <input type="text" name="first_name" placeholder="Имя" required />
                        </label>
                        <label>
                            <input type="text" name="last_name" placeholder="Фамилия" required />
                        </label>
                    </div>
                    <div class="form__group">
                        <label>
                            <input type="email" name="email" placeholder="Email" required />
                        </label>
                        <label>
                            <input type="tel" name="phone" placeholder="Телефон" required />
                        </label>
                    </div>
                    <button type="submit">Записаться</button>
                </form>
            </div>
        </section>

        <section id="contacts" class="contacts">
            <iframe
                src="https://yandex.ru/map-widget/v1/?um=constructor%3A3fa8a745cc53df0cb2fd3adf9003ec9aec80ade7a21a8d0ed202363499b9cf7f&amp;source=constructor"
                width="100%" height="500" frameborder="0"></iframe>

            <div class="contacts__container">
                <div class="contacts__wrapper">
                    <div class="contacts__address">
                        <span class="material-symbols-outlined"> location_on </span>
                        <p>Череповец, ул. Косманавта Беляева, д. 66а</p>
                    </div>

                    <div class="contacts__tel">
                        <span class="material-symbols-outlined"> call </span>
                        <ul>
                            <li>+7 (820) 264-31-53</li>
                            <li>+7 (931) 514-24-54</li>
                            <li>+7 (911) 506-27-48</li>
                        </ul>
                    </div>
                    <div class="contacts__text">ООО "КПС"</div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer">
            <div class="footer__wrapper">
                <img src="img/logo.png" alt="logo" />
                <nav>
                    <ul>
                        <li><a href="#about">О школе</a></li>
                        <li><a href="#coaches">Тренеры</a></li>
                        <li><a href="#schedule">Расписание</a></li>
                        <li><a href="#pricelist">Цены</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                    </ul>
                </nav>
                <img class="footer__img" src="img/footer_boy.png" alt="footbal lboy" />
                <div class="social">
                    <div class="social__address">
                        <span class="material-symbols-outlined"> location_on </span>
                        <p>Череповец, ул. Косманавта Беляева, д. 66а</p>
                    </div>

                    <div class="social__tel">
                        <span class="material-symbols-outlined"> call </span>
                        <ul>
                            <li>+7 (820) 264-31-53</li>
                            <li>+7 (931) 514-24-54</li>
                            <li>+7 (911) 506-27-48</li>
                        </ul>
                    </div>
                    <div class="social__text">ООО "КПС"</div>
                </div>
            </div>
            <div class="copyright">
                © 2013 – 2025 Design Studio YVK | All Rights Reserved
            </div>
        </div>
    </footer>
</body>

</html>