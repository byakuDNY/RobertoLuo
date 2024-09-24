<?php
include "../template/head_template.php";
require_once "../db/Database.php";
?>

<h1 style="margin-bottom: 5%;">Ver Las Marcas, Modelos y Tipos de Vehículos</h1>

<form>
    <div>
        <label for="marca_id">Marcas:</label>
        <select id="marca_id" name="marca_id">
            <option value="">Seleccione una marca</option>
            <?php

            $database = Database::getInstancia();
            $conn = $database->getConnection();

            $stmt = $conn->query("SELECT * FROM marcas_automoviles");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $filterNombre = htmlspecialchars($row['nombre']);
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $filterNombre; ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <br>

    <div>
        <label for="tipo_id">Tipo:</label>
        <select id="tipo_id" name="tipo_id">
            <option value="">Seleccione un tipo</option>
            <?php

            $database = Database::getInstancia();
            $conn = $database->getConnection();

            $stmt = $conn->query("SELECT * FROM tipos_automoviles");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $filterNombre = htmlspecialchars($row['nombre']);
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $filterNombre; ?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <br>

    <div>
        <label for="modelo_id">Modelo:</label>
        <select id="modelo_id" name="modelo_id">
            <option value="">Seleccione un modelo</option>
        </select>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const marcaSelect = document.getElementById('marca_id');
        const tipoSelect = document.getElementById('tipo_id');
        const modeloSelect = document.getElementById('modelo_id');

        const handleChange = async () => {
            const marcaValue = marcaSelect.value;
            const tipoValue = tipoSelect.value;

            if (marcaValue && tipoValue) {
                try {
                    const response = await fetch('../controllers/procesar_distritos.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            marca_id: marcaValue,
                            tipo_id: tipoValue
                        })
                    });

                    if (!response.ok) {
                        throw new Error('Error de respuesta del servidor');
                    }

                    const html = await response.text();
                    modeloSelect.innerHTML = html;
                } catch (error) {
                    console.error('Error de request al servidor:', error);
                }
            } else {
                modeloSelect.innerHTML = '<option value="">Marca o tipo no seleccionado</option>';
            }
        };

        marcaSelect.addEventListener('change', handleChange);
        tipoSelect.addEventListener('change', handleChange);
    });
</script>


<?php
include "../template/foot_template.php";
?>