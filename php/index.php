<?php
session_start(); // Iniciar sesión

// Configuración de la base de datos
$host = "localhost";
$dbname = "USUARIOS";
$dbuser = "php";
$dbpass = "";

// Conectar a MySQL
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener datos del formulario
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
    $query = "SELECT PASS FROM USUARIOS WHERE EMAIL = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verificar contraseña
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            mysqli_close($conn);
            header("Location: tablaPeliculas.php");
            exit();
        }
    }
}

// Si falla login
mysqli_close($conn);
header("Location: ../index.html");
exit();
?>