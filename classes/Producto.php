<?php
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

    public static function catalogo_completo(): array
    {
        $catalogo = [];
        $json_crudo = file_get_contents("data/productos.json");
        $productos_raw = json_decode($json_crudo);

        foreach ($productos_raw as $p) {
            $item = new self();
            $item->id = $p->id;
            $item->nombre = $p->nombre;
            $item->descripcion = $p->descripcion;
            $item->precio = $p->precio;
            $item->categoria = $p->categoria;
            $item->imagen = $p->imagen;
            $item->fecha_fabricacion = $p->fecha_fabricacion;
            $item->descripcion_detallada = $p->descripcion_detallada;
            $catalogo[] = $item;
        }
        return $catalogo;
    }

    public static function catalogo_x_categoria(string $categoria): array
    {
        $resultado = [];
        $todos = self::catalogo_completo();
        foreach ($todos as $p) {
            if ($p->categoria === $categoria) {
                $resultado[] = $p;
            }
        }
        return $resultado;
    }

    public static function producto_x_id(int $id): ?Producto
    {
        $todos = self::catalogo_completo();
        foreach ($todos as $p) {
            if ($p->id == $id) {
                return $p;
            }
        }
        return null;
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

    public function precio_formateado(): string
    {
        return "$" . number_format($this->precio, 2, ',', '.');
    }
}