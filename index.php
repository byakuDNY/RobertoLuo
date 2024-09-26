<?php
include_once "template/head_template.php";
require_once "db/Database.php";
?>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <a href="views/registrar_automovil.php" class="btn">Registrar un nuevo automóvil</a>
    <a href="views/registrar_propietario.php" class="btn">Registrar un nuevo propietario</a>
    <a href="views/buscar_automovil.php" class="btn">Buscar Automóvil</a>
</div>

<form style="margin-top: 2%;">
    <h2>Ver Las Marcas, Modelos y Tipos de Vehículos</h2>
    <?php
    require_once "views/combobox_automovil.php";
    ?>
</form>

<?php

include_once "template/foot_template.php";
?>