<?php
class Conexion{
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'cyberlife';
    private const DB_DSN = 'mysql:host='. self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';
    private static ?PDO $conexion = null;

    public static function getConexion(): PDO{
        if(self::$conexion === null){
            try{
                self::$conexion = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                die('Error de conexión a la base de datos: '. $e->getMessage());
            }
        }
        return self::$conexion;
    }
}
