<?php
include "../db/Database.php";
include "../models/Automovil.php";

try {
    $database = Database::getInstancia();
    $conn = $database->getConnection();

    $automovil = new Automovil($conn);

    $automovil->placa = $_POST['placa'];
    $automovil->marca_id = $_POST['marca_id'];
    $automovil->modelo_id = $_POST['modelo_id'];
    $automovil->tipo_id = $_POST['tipo_id'];
    $automovil->anio = $_POST['anio'];
    $automovil->color = $_POST['color'];
    $automovil->numero_motor = $_POST['numero_motor'];
    $automovil->numero_chasis = $_POST['numero_chasis'];

    if ($automovil->registrar()) {
        $output = "Registro realizado exitosamente";
    } else {
        $output = "Error al procesar formulario";
    }
} catch (Exception $e) {
    error_log("Error al procesar formulario: " . $e->getMessage());
    $output = "Error al procesar formulario: " . $e->getMessage();
}
?>

<script>
    setTimeout(() => {
        window.location.href = "../index.php";
    }, 5000);
</script>

<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        animation: spin 5s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .centrar {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 20px;
        height: 100vh;
    }
</style>
<div class="centrar">
    <h1><?php
        echo $output;
        ?></h1>
    <div class="loader"></div>
    <span>
        Serás redirigido en 5 segundos
    </span>
</div>