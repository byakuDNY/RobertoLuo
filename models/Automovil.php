<?php
class Automovil {
    private $conn;

    public $placa;
    public $marca_id;
    public $modelo_id;
    public $tipo_id;
    public $anio;
    public $color;
    public $numero_motor;
    public $numero_chasis;
    public $propietarios_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar() {
        try {
            $query =
                "INSERT INTO automoviles (placa, marca_id, modelo_id, tipo_id, anio, color, numero_motor, numero_chasis, propietarios_id) VALUES (:placa, :marca_id, :modelo_id, :tipo_id, :anio, :color, :numero_motor, :numero_chasis, :propietarios_id)";

            $stmt = $this->conn->prepare($query);

            $this->placa = trim(htmlspecialchars(strip_tags($this->placa)));
            $this->marca_id = trim(htmlspecialchars(strip_tags($this->marca_id)));
            $this->modelo_id = trim(htmlspecialchars(strip_tags($this->modelo_id)));
            $this->tipo_id = trim(htmlspecialchars(strip_tags($this->tipo_id)));
            $this->anio = trim(htmlspecialchars(strip_tags($this->anio)));
            $this->color = trim(htmlspecialchars(strip_tags($this->color)));
            $this->numero_motor = trim(htmlspecialchars(strip_tags($this->numero_motor)));
            $this->numero_chasis = trim(htmlspecialchars(strip_tags($this->numero_chasis)));
            $this->propietarios_id = trim(htmlspecialchars(strip_tags($this->propietarios_id)));

            $stmt->bindParam(":placa", $this->placa);
            $stmt->bindParam(":marca_id", $this->marca_id);
            $stmt->bindParam(":modelo_id", $this->modelo_id);
            $stmt->bindParam(":tipo_id", $this->tipo_id);
            $stmt->bindParam(":anio", $this->anio);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":numero_motor", $this->numero_motor);
            $stmt->bindParam(":numero_chasis", $this->numero_chasis);
            $stmt->bindParam(":propietarios_id", $this->propietarios_id);

            if ($stmt->execute()) {
                return "Registro exitoso";
            }

            return "Error al registrar automovil";
        } catch (Exception $e) {
            error_log("Error al registrar automovil: " . $e->getMessage());
            return "Error al registrar automovil";
        }
    }

    public function buscar() {
        try {
            $query = "SELECT 
                automoviles.placa,
                marca.nombre AS marca_id, 
                modelo.nombre AS modelo_id, 
                tipo.nombre AS tipo_id, 
                automoviles.anio, 
                automoviles.color, 
                automoviles.numero_motor, 
                automoviles.numero_chasis, 
                automoviles.propietarios_id
                FROM automoviles
                INNER JOIN marcas_automoviles AS marca ON automoviles.marca_id = marca.id 
                INNER JOIN modelos_automoviles AS modelo ON automoviles.modelo_id = modelo.id
                INNER JOIN tipos_automoviles AS tipo ON automoviles.tipo_id = tipo.id
                WHERE automoviles.placa = :placa";



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
                    $this->propietarios_id = $row["propietarios_id"];

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
