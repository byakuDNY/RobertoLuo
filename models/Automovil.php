<?php
class Automovil {
    private $conn;
    private $table_name = "automoviles";

    public $placa;
    public $marca_id;
    public $modelo_id;
    public $tipo_id;
    public $anio;
    public $color;
    public $numero_motor;
    public $numero_chasis;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar() {
        try {
            $query =
                "INSERT INTO " .
                $this->table_name .
                " (placa, marca_id, modelo_id, tipo_id, anio, color, numero_motor, numero_chasis) VALUES (:placa, :marca_id, :modelo_id, :tipo_id, :anio, :color, :numero_motor, :numero_chasis)";

            $stmt = $this->conn->prepare($query);

            $this->placa = htmlspecialchars(strip_tags($this->placa));
            $this->marca_id = htmlspecialchars(strip_tags($this->marca_id));
            $this->modelo_id = htmlspecialchars(strip_tags($this->modelo_id));
            $this->tipo_id = htmlspecialchars(strip_tags($this->tipo_id));
            $this->anio = htmlspecialchars(strip_tags($this->anio));
            $this->color = htmlspecialchars(strip_tags($this->color));
            $this->numero_motor = htmlspecialchars(strip_tags($this->numero_motor));
            $this->numero_chasis = htmlspecialchars(
                strip_tags($this->numero_chasis)
            );

            $stmt->bindParam(":placa", $this->placa);
            $stmt->bindParam(":marca_id", $this->marca_id);
            $stmt->bindParam(":modelo_id", $this->modelo_id);
            $stmt->bindParam(":tipo_id", $this->tipo_id);
            $stmt->bindParam(":anio", $this->anio);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":numero_motor", $this->numero_motor);
            $stmt->bindParam(":numero_chasis", $this->numero_chasis);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        } catch (Exception $e) {
            error_log("Error al registrar: " . $e->getMessage());
            return false;
        }
    }

    public function buscar() {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE placa = :placa";

            $stmt = $this->conn->prepare($query);

            $this->placa = htmlspecialchars(strip_tags($this->placa));

            $stmt->bindParam(":placa", $this->placa);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    $this->placa = $row["placa"];
                    $this->marca_id = $row["marca_id"];
                    $this->modelo_id = $row["modelo_id"];
                    $this->tipo_id = $row["tipo_id"];
                    $this->anio = $row["anio"];
                    $this->color = $row["color"];
                    $this->numero_motor = $row["numero_motor"];
                    $this->numero_chasis = $row["numero_chasis"];

                    return true;
                }
            }
            return false;
        } catch (Exception $e) {
            error_log("Error al buscar: " . $e->getMessage());
            return false;
        }
    }
}
