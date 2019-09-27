<?php

$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$texto = $_POST['texto'];

//Database connection
$servername = "localhost";
$username = "root";
$password = "AlexanderLeo22";
$table = "revistadb";

// Create connection
$conn = new mysqli($servername, $username, $password, $table);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn -> prepare("INSERT INTO articulos(titulo, fecha, texto) 
        value(?, ?, ?)");
    $stmt -> bind_param("srs", $titulo, $fecha, $texto);
    $stmt -> close();
    $conn -> close();
}
?>