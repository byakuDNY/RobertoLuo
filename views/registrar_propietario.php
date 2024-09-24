<?php
include "../template/head_template.php";
?>
<div style="margin-bottom: 5%; font-size: xx-large; font-weight: bolder;">
    <label style="display: block;" for="tipo_propietario">Tipo de Propietario:</label>
    <select style="font-size: large; font-weight: bolder;" name="tipo_propietario" id="tipo_propietario" required>
        <option value="">Seleccione un tipo</option>
        <option value="natural">Natural</option>
        <option value="juridico">Jurídico</option>
    </select>
</div>

<form action="../controllers/procesar_registro_propietario.php" method="post" id="natural_form" style="display: none;">
    <h2>Registrar Propietario Natural</h2>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required>

    <label for="cedula">Cédula:</label>
    <input type="text" name="id" id="cedula" required>

    <label for="telefono">Teléfono:</label>
    <input type="tel" name="telefono" id="telefono" required pattern="\d{8}" title="Debe contener 8 dígitos">

    <button type="submit">Registrar Propietario</button>
</form>


<form action="../controllers/procesar_registro_propietario.php" method="post" id="juridico_form" style="display: none;">
    <h2>Registrar Propietario Jurídico</h2>

    <label for="nombre_juridico">Nombre de la Organización:</label>
    <input type="text" name="nombre" id="nombre_juridico" required>

    <label for="ruc">RUC:</label>
    <input type="text" name="id" id="ruc" required>

    <button type="submit">Registrar Propietario</button>
</form>

<script>
    document.getElementById('tipo_propietario').addEventListener('change', function() {
        const naturalForm = document.getElementById('natural_form');
        const juridicoForm = document.getElementById('juridico_form');

        if (this.value === 'natural') {
            naturalForm.style.display = 'block';
            juridicoForm.style.display = 'none';
        } else if (this.value === 'juridico') {
            naturalForm.style.display = 'none';
            juridicoForm.style.display = 'block';
        } else {
            naturalForm.style.display = 'none';
            juridicoForm.style.display = 'none';
        }
    });
</script>

<?php
include "../template/foot_template.php";
?>