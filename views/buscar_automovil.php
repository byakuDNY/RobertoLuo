<?php
include "../template/head_template.php";
?>
<form action="../controllers/procesar_busqueda.php" method="post">
    <h2>Buscar Automóvil</h2>

    <label for="placa">Placa:</label>
    <input type="text" id="placa" name="placa" required>

    <input type="submit" value="Buscar">
</form>
<?php
include "../template/foot_template.php"
?>