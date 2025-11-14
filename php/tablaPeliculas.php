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


$query = "SELECT * FROM PELICULAS";
$result = mysqli_query($conn, $query);

echo "<table>";
// Cabeceras
    echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Título</th>";
        echo "<th>Dirección</th>";
        echo "<th>Estreno</th>";
        echo "<th>Nota IMDB</th>";
    echo "</tr>";

// Filas
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
        // Campos
        foreach($row as $clave=>$valor){
            echo "<td>$valor</td>";
        }
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

?>
<button onclick="location.href='../index.html'">Cerrar sesión</button>