<?php
include "../template/head_template.php";
?>
<form action="../controllers/procesar_busqueda_automovil.php" method="post">
    <h2>Buscar Automóvil</h2>

    <label for="placa">Placa:</label>
    <input type="text" id="placa" name="placa" required>

    <button type="submit">Buscar Automóvil</button>
</form>
<?php
include "../template/foot_template.php"
?>