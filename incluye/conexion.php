<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "rock_usuarios";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>