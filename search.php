<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$from = $_GET['from'];
$to = $_GET['to'];
$date = $_GET['date'];

$sql = "SELECT * FROM tickets WHERE departure_station = '$from' AND arrival_station = '$to' AND DATE(departure_time) = '$date'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты поиска</title>
    <link rel="stylesheet" href="/Railway/search.css">
</head>
<body>
    <header class="main-header">
        <div class="header-logo">
            <span>TRANSAVIA.KZ</span>
            <span class="arrow">›</span>
        </div>
        <nav class="header-nav">
            <a href="index.php">Главная</a>
        </nav>
    </header>
    <div class="search-results">
        <h1>Результаты поиска</h1>
        <p><?php echo htmlspecialchars($from) . " - " . htmlspecialchars($to) . ", " . htmlspecialchars($date); ?></p>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='train'>";
                echo "<h2>Номер поезда: " . htmlspecialchars($row['train_number']) . "</h2>";
                echo "<p>Отправление: " . htmlspecialchars($row['departure_station']) . " в " . htmlspecialchars($row['departure_time']) . "</p>";
                echo "<p>Прибытие: " . htmlspecialchars($row['arrival_station']) . " в " . htmlspecialchars($row['arrival_time']) . "</p>";
                echo "<p>Время в пути: " . htmlspecialchars($row['travel_time']) . "</p>";
                echo "<p>Тип места: " . htmlspecialchars($row['seat_type']) . "</p>";
                echo "<p>Цена: " . htmlspecialchars($row['price']) . " Тенге</p>";
                echo "</div>";
            }
        } else {
            echo "<p>На это число нету поездов</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
