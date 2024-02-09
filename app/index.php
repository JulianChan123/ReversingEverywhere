<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mymachine";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../templates/upload.html");
} else {
    header("Location: ../templates/index.html");
}

$conn->close();
?>