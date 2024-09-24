<?php
require_once '../db/Database.php';

try {
    $database = Database::getInstancia();
    $conn = $database->getConnection();

    $marca_id = $_POST['marca_id'];
    $tipo_id = $_POST['tipo_id'];

    $stmt = $conn->prepare("SELECT modelo.id, modelo.nombre 
                                FROM modelos_automoviles AS modelo
                                INNER JOIN marcas_automoviles AS marca ON modelo.marca_id = marca.id
                                INNER JOIN tipos_automoviles AS tipo ON modelo.tipo_id = tipo.id
                                WHERE marca.id = ? AND tipo.id = ?");
    $stmt->execute([$marca_id, $tipo_id]);

    $modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($modelos) {
        foreach ($modelos as $modelo) {
            echo "<option value='{$modelo['id']}'>{$modelo['nombre']}</option>";
        }
    } else {
        echo '<option value="">No hay modelos disponibles</option>';
    }
} catch (Exception $e) {
    echo '<option value="">Hubo un error al procesar la solicitud: ' . htmlspecialchars($e->getMessage()) . '</option>';
}
