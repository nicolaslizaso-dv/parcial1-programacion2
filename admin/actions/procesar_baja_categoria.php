<?php
session_start();
require_once "../../classes/Conexion.php";
require_once "../../classes/Categoria.php";

if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') exit();

$id = $_GET['id'] ?? null;
if ($id) {
    if(!Categoria::delete($id)){
        header("Location: ../index.php?sec=panel_categorias&error=true");
        exit();
    }
}

header("Location: ../index.php?sec=panel_categorias");
exit();