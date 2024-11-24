<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

$response = array();

if ($conn->connect_error) {
    $response["status"] = "error";
    $response["message"] = "Connection failed: " . $conn->connect_error;
} else {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['role'] == 'admin') {
                // Проверка пароля для администратора без хэширования
                if ($password === $row['password']) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $response["status"] = "success";
                    $response["redirect"] = "admin.php";
                    $response["message"] = "Добро пожаловать, " . $row['username'] . "!";
                } else {
                    $response["status"] = "error";
                    $response["message"] = "Неправильный пароль.";
                }
            } else {
                // Проверка пароля для обычных пользователей с хэшированием
                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $response["status"] = "success";
                    $response["redirect"] = "index.php";
                    $response["message"] = "Добро пожаловать, " . $row['username'] . "!";
                } else {
                    $response["status"] = "error";
                    $response["message"] = "Неправильный пароль.";
                }
            }
        } else {
            $response["status"] = "error";
            $response["message"] = "Пользователь с таким email не найден.";
        }
    } else {
        $response["status"] = "error";
        $response["message"] = "Пожалуйста, заполните все поля.";
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
