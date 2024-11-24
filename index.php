<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск Ж/Д билетов</title>
    <link rel="stylesheet" href="/Railway/index.css">
</head>
<body>
    <header class="main-header">
        <div class="header-logo">
            <span>TRANSAVIA.KZ</span>
            <span class="arrow">›</span>
        </div>
        <nav class="header-nav">
            <a href="#">Контакты</a>
            <a href="#">Услуги</a>
            <a href="#">О компании</a>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<span>Добро пожаловать, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
                echo '<a href="logout.php">Выход</a>';
            } else {
                echo '<a href="login.html">Вход</a>';
            }
            ?>
        </nav>
    </header>
    <div class="hero">
        <h1 class="title">Поиск Ж/Д билетов</h1>
        <p class="subtitle">Бронируйте билеты выгодно и легко!</p>
        <div class="search-form">
        <form action="https://tiiny.host/manage/search.php" method="GET">
            <input class="js-input-from" type="text" name="from" placeholder="Откуда" required>
            <input class="js-input-to" type="text" name="to" placeholder="Куда" required>
            <input class="js-data" type="date" name="date" required>
            <button class="js-search" type="submit">Поиск</button>
        </form>
        </div>
        <div class="js-input-show"></div>
        <div class="logos">
            <img src="/Railway/img/visa-light.png" alt="Visa">
            <img src="/Railway/img/mastercard-light.png" alt="MasterCard">
            <img src="/Railway/img/kaspi-light.png" alt="Kaspi Gold">
        </div>
    </div>
    <footer>
        © 2024 Все права защищены.
    </footer>
    <script src="/Railway/index.js"></script>
</body>
</html>
