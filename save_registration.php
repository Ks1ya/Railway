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

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['birthdate'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT INTO users (username, password, email, birthdate) VALUES ('$username', '$password', '$email', '$birthdate')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Регистрация прошла успешно.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Пожалуйста, заполните все поля.";
}

$conn->close();
?>
