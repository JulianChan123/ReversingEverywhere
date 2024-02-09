<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mycloud";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Modificación: Crear una consulta SQL vulnerable a SQL injection
$sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";

$result = $conn->query($sql);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($result->num_rows > 0) {
    // Usuario autenticado, redirigir a la página "hello world"
    header("Location: upload.php");
} else {
    // Credenciales incorrectas, redirigir de nuevo al formulario de inicio de sesión
    header("Location: index.html");
}

$conn->close();
?>