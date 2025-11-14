<?php

$host = "localhost";
$dbname = "Ciber";
$dbuser = "php";
$dbpass = "";

// Conectar a MySQL
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM USUARIOS WHERE EMAIL = '$email' AND PASS = '$password'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) === 1) {
    mysqli_close($conn);
    header("Location: tablaPeliculas.php");
    exit();
}

mysqli_close($conn);
header("Location: ../index.html");
exit();
?>