<?php 
require_once "recursos/rutas.php";
require_once "recursos/conexion.php";
require_once "recursos/estructura.php";
if (isset($_GET["controlador"]) && isset($_GET["accion"])) {
        $controlador = $_GET["controlador"];
        $accion = $_GET["accion"];
} else {
    $controlador = "inicio";
    $accion = "index";
}

rutas::cargar_contenido($controlador,$accion);
?>