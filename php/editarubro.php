<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../class/class.rubros.php';

$rubro = new Rubro();

if (isset($_POST['id']) && isset($_POST['nombre'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $rubro->edit($id, $nombre);
    header('Location: ../listarubros.php');
    exit;
} else {
    echo '<script>alert("Error: No se actualizó el registro.");</script>';
    header('Location: ../listarubros.php');
    exit;
}
?>
