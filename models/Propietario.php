<?php
class Propietario {
    private $table_name = "propietarios";
    private $conn;

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar() {
        try {
            $query =
                "INSERT INTO " .
                $this->table_name .
                " (id, nombre, apellido, telefono) VALUES (:id, :nombre, :apellido, :telefono)";

            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->apellido = htmlspecialchars(strip_tags($this->apellido));
            $this->telefono = htmlspecialchars(strip_tags($this->telefono));

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":apellido", $this->apellido);
            $stmt->bindParam(":telefono", $this->telefono);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (Exception $e) {
            error_log("Error al registrar: " . $e->getMessage());
            return false;
        }
    }
}
