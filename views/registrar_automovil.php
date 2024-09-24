<?php
include "../template/head_template.php";
?>
<form action="../controllers/procesar_registro.php" method="post">
    <h2>Registrar Automóvil</h2>

    <label for="placa">Placa:</label>
    <input type="text" name="placa" id="placa" required>

    <label for="marca_id">Marca:</label>
    <input type="text" name="marca_id" id="marca_id" required>

    <label for="modelo_id">Modelo:</label>
    <input type="text" name="modelo_id" id="modelo_id" required>

    <label for="tipo_id">Tipo:</label>
    <input type="text" name="tipo_id" id="tipo_id" required>

    <label for="anio">Año:</label>
    <input type="number" name="anio" id="anio" required>

    <label for="color">Color:</label>
    <input type="text" name="color" id="color" required>

    <label for="numero_motor">Número de Motor:</label>
    <input type="text" name="numero_motor" id="numero_motor" required>

    <label for="numero_chasis">Número de Chasis:</label>
    <input type="text" name="numero_chasis" id="numero_chasis" required>

    <input type="submit" value="Registrar">
</form>
<?php
include "../template/foot_template.php"
?>