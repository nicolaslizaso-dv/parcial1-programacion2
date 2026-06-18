<?php
require_once "Conexion.php";

class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $fecha_fabricacion;
    private $descripcion_detallada;
    private $serie_id;
    private $categoria;

    public static function catalogo_completo(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT productos.*, series.nombre AS categoria 
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
        $PDOStatement->execute(['categoria' => $categoria]);
        
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
        $PDOStatement->execute(['id' => $id]);
        
        $resultado = $PDOStatement->fetch();
        return $resultado ? $resultado : null;
    }

    public static function insert(string $nombre, string $descripcion, float $precio, string $imagen, string $fecha_fabricacion, string $descripcion_detallada, int $serie_id): void
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO productos (nombre, descripcion, precio, imagen, fecha_fabricacion, descripcion_detallada, serie_id) 
                  VALUES (:nombre, :descripcion, :precio, :imagen, :fecha_fabricacion, :descripcion_detallada, :serie_id)";
        
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'imagen' => $imagen,
            'fecha_fabricacion' => $fecha_fabricacion,
            'descripcion_detallada' => $descripcion_detallada,
            'serie_id' => $serie_id
        ]);
    }

    public static function categorias_disponibles(): array 
    {
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

    public static function delete(int $id): void
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM productos WHERE id = :id";
        
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['id' => $id]);
    }

    public static function edit(int $id, string $nombre, string $descripcion, float $precio, string $imagen, string $fecha_fabricacion, string $descripcion_detallada, int $serie_id): void
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE productos SET 
                    nombre = :nombre, 
                    descripcion = :descripcion, 
                    precio = :precio, 
                    imagen = :imagen, 
                    fecha_fabricacion = :fecha_fabricacion, 
                    descripcion_detallada = :descripcion_detallada, 
                    serie_id = :serie_id 
                  WHERE id = :id";
        
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'imagen' => $imagen,
            'fecha_fabricacion' => $fecha_fabricacion,
            'descripcion_detallada' => $descripcion_detallada,
            'serie_id' => $serie_id
        ]);
    }
}