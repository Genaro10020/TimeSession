<?php
$hostname = 'localhost';
$database = 'time_users';
$username = 'root';
$password = '';

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion->connect_error) {
    echo "Error al conectarse con la BD";
}
