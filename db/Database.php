<?php
class Database {
    private $host = "localhost";
    private $db_name = "gestion_automoviles";
    private $username = "root";
    private $password = "";
    private $conn;
    private static $instancia = null;

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Error en la conexión a la base de datos: " . $exception->getMessage());
        }
    }

    // obtener solamente una instancia del base de datos
    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Database();
        }
        return self::$instancia;
    }

    public function getConnection() {
        return $this->conn;
    }
}
