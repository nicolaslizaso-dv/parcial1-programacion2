<?php
session_start();
require_once "../../classes/Conexion.php";
require_once "../../classes/Categoria.php";

if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') exit();

$nombre = $_POST['nombre'] ?? '';
if (!empty($nombre)) { Categoria::insert($nombre); }

header("Location: ../index.php?sec=panel_categorias");
exit();