<?php
require_once "Conexion.php";

class Categoria
{
    private $id;
    private $nombre;

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }

    public static function lista_completa(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM series";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll();
    }

    public static function categoria_x_id(int $id): ?Categoria
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM series WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['id' => $id]);
        $resultado = $PDOStatement->fetch();
        return $resultado ? $resultado : null;
    }

    public static function insert(string $nombre): void
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO series (nombre) VALUES (:nombre)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre' => $nombre]);
    }

    public static function edit(int $id, string $nombre): void
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE series SET nombre = :nombre WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $id,
            'nombre' => $nombre
        ]);
    }

    public static function delete(int $id): bool
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM series WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        
        try {
            $PDOStatement->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}