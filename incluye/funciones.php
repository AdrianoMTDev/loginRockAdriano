<?php
session_start();

function usuario_autenticado() {
    return isset($_SESSION['usuario']);
}

function redirigir_si_no_autenticado() {
    if (!usuario_autenticado()) {
        header("Location: ingresar.php");
        exit;
    }
}
?>
