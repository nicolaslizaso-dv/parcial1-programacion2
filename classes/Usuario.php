<?php
require_once "Conexion.php";

class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol;

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getEmail() { return $this->email; }
    public function getRol() { return $this->rol; }

    public static function loguear(string $email, string $password): bool
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['email' => $email]);

        $usuario = $PDOStatement->fetch();

        if ($usuario) {
            if (password_verify($password, $usuario->password)) {
                $_SESSION['usuario_id'] = $usuario->getId();
                $_SESSION['usuario_nombre'] = $usuario->getNombre();
                $_SESSION['usuario_rol'] = $usuario->getRol();
                return true;
            }
        }
        return false;
    }

    public static function logout(): void
    {
        session_destroy();
        $_SESSION = [];
    }

    public static function registrar(string $nombre, string $email, string $password): bool{
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, 'cliente')";
        $PDOStatement = $conexion->prepare($query);
        $clave_segura = password_hash($password, PASSWORD_DEFAULT);
        try{
            $PDOStatement->execute([
                'nombre'=>$nombre,
                'email'=>$email,
                'password'=>$clave_segura,
            ]);
            return true;
        } catch (PDOException $e){
            return false;
        }
    }
}