<?php
// Muestra el mensaje exigido por el Ejercicio 1
echo "<h2>Bienvenido al Examen de Laboratorio de MVC</h2>";

// Inicia el flujo del patrón MVC
require_once 'controlador/Controlador.php';
$controlador = new Controlador();
$controlador->procesarSolicitud();
?>