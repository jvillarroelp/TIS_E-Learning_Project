<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "elearning_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos!";
}
?>
