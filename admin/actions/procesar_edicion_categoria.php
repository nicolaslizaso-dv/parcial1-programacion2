<?php
session_start();
require_once "../../classes/Conexion.php";
require_once "../../classes/Categoria.php";

if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') exit();

$id = $_POST['id'] ?? null;
$nombre = $_POST['nombre'] ?? '';
if ($id && !empty($nombre)) { Categoria::edit($id, $nombre); }

header("Location: ../index.php?sec=panel_categorias");
exit();