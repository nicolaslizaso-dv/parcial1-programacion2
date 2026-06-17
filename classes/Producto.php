<?php
require_once "Conexion.php";
class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $categoria;
    private $imagen;
    private $fecha_fabricacion;
    private $descripcion_detallada;
    private $serie_id;

    public static function catalogo_completo(): array
    {
        $conexion = Conexion::getConexion();
        $query ="SELECT productos.*, series.nombre AS categoria
                FROM productos
                JOIN series ON productos.serie_id = series.id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll();
    }

    public static function catalogo_x_categoria(string $categoria): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT productos.*, series.nombre AS categoria
        FROM productos
        JOIN series ON productos.serie_id = series.id
        WHERE series.nombre = :categoria";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['categoria'=>$categoria]);
        return $PDOStatement->fetchAll();
    }

    public static function producto_x_id(int $id): ?Producto
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT productos.*, series.nombre AS categoria
        FROM productos
        JOIN series ON productos.serie_id = series.id
        WHERE productos.id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['id'=>$id]);
        $resultado = $PDOStatement->fetch();
        return $resultado ? $resultado : null;
    }

    public static function categorias_disponibles(): array {
        $todos = self::catalogo_completo();
        $categorias = [];
        foreach ($todos as $robot) {
            if (!in_array($robot->getCategoria(), $categorias)) {
                $categorias[] = $robot->getCategoria();
            }
        }
        return $categorias;
    }

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }
    public function getPrecio() { return $this->precio; }
    public function getCategoria() { return $this->categoria; }
    public function getImagen() { return $this->imagen; }
    public function getFechaFabricacion() { return $this->fecha_fabricacion; }
    public function getDescripcionDetallada() { return $this->descripcion_detallada; }
    public function getSerieId() { return $this->serie_id; }


    public function precio_formateado(): string
    {
        return "$" . number_format($this->precio, 2, ',', '.');
    }
}