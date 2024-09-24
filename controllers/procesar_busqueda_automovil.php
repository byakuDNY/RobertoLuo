<?php
include '../db/Database.php';
include '../models/Automovil.php';

try {
    $database = Database::getInstancia();
    $conn = $database->getConnection();

    $automovil = new Automovil($conn);

    $automovil->placa = $_POST['placa'] = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($automovil->buscar()) {
?>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
        <h2>Resultado de la Búsqueda con Placa:
            <?php echo $automovil->placa ?>
        </h2>
        <table>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Color</th>
                <th>Número de Motor</th>
                <th>Número de Chasis</th>
                <th>Tipo de Vehículo</th>
            </tr>
            <tr>
                <td><?php echo $automovil->placa; ?></td>
                <td><?php echo $automovil->marca_id; ?></td>
                <td><?php echo $automovil->modelo_id; ?></td>
                <td><?php echo $automovil->tipo_id; ?></td>
                <td><?php echo $automovil->anio; ?></td>
                <td><?php echo $automovil->color; ?></td>
                <td><?php echo $automovil->numero_motor; ?></td>
                <td><?php echo $automovil->numero_chasis; ?></td>
            </tr>
        </table>
<?php
    } else {
        echo "No se encontró ningún automóvil con la placa especificada.";
    }
} catch (Exception $e) {
    error_log("Error al procesar formulario: " . $e->getMessage());
    echo "Error al procesar formulario";
}
?>
<br>
<a href="../index.php">Volver a la pagina principal</a>