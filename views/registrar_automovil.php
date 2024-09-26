<?php
include_once "../template/head_template.php";
require_once "../db/Database.php";
?>
<form action="../controllers/procesar_registro_automovil.php" method="post">
    <h2>Registrar Automóvil</h2>

    <label for="placa">Placa:</label>
    <input type="text" name="placa" id="placa" required>

    <?php
    include_once "./combobox_automovil.php";
    ?>

    <label for="anio">Año:</label>
    <input type="number" name="anio" id="anio" required>

    <label for="color">Color:</label>
    <input type="text" name="color" id="color" required>

    <label for="numero_motor">Número de Motor:</label>
    <input type="text" name="numero_motor" id="numero_motor" required>

    <label for="numero_chasis">Número de Chasis:</label>
    <input type="text" name="numero_chasis" id="numero_chasis" required>

    <label for="propietarios_id">Propietario:</label>
    <input type="text" name="propietarios_id" id="propietarios_id" required>

    <button type="submit">Registrar Automóvil</button>
</form>
<?php
include "../template/foot_template.php"
?>