<?php
include '../class/class.personas.php';
$Persona = new Persona();

$idpersona = $_POST['idpersona'];

if ($idpersona != null) {
    // Recuperar datos personales en función de la ID proporcionada
    $query = $Persona->getPersona($idpersona);

    while ($fila = mysqli_fetch_array($query)) {
        ?>
        <script type="text/javascript">
            // Establecer valores para los campos de teléfono e ID en el formulario
            $('#telefono').val(<?= json_encode($fila['telefono']) ?>);
            $('#cedula').val(<?= json_encode($fila['ciruc']) ?>);
        </script>
        <?php
    }
} else {
    // Si no se proporcionó ningun ID, borre los campos
    ?>
    <script type="text/javascript">
        $('#telefono').val('');
        $('#ciruc').val('');
    </script>
    <?php
}
?>
