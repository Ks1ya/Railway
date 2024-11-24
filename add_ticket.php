<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Доступ запрещен. Вы не являетесь администратором.";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['train_number']) && isset($_POST['departure_station']) && isset($_POST['arrival_station']) && isset($_POST['departure_time']) && isset($_POST['arrival_time']) && isset($_POST['travel_time']) && isset($_POST['seat_type']) && isset($_POST['price'])) {
    $train_number = $_POST['train_number'];
    $departure_station = $_POST['departure_station'];
    $arrival_station = $_POST['arrival_station'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $travel_time = $_POST['travel_time'];
    $seat_type = $_POST['seat_type'];
    $price = $_POST['price'];

    $sql = "INSERT INTO tickets (train_number, departure_station, arrival_station, departure_time, arrival_time, travel_time, seat_type, price) VALUES ('$train_number', '$departure_station', '$arrival_station', '$departure_time', '$arrival_time', '$travel_time', '$seat_type', '$price')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Билет успешно добавлен.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Пожалуйста, заполните все поля.";
}

$conn->close();
?>
