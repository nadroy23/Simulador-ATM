<?php
$servername = "localhost";
$username = "admin";
$password = "01011001";
$bd = "CajeroAutomatico";

// Create connection
$conexion = mysqli_connect($servername, $username, $password, $bd);

// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
#return $conn;