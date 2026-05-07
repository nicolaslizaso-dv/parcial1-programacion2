<?php
class Producto {
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria;
    public $imagen;
    public $fecha_fabricacion;
    public $descripcion_detallada;

    public function precio_formateado() {
        return "$" . number_format($this->precio, 2, ',', '.');
    }
}
?>