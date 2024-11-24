<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../class/class.rubros.php';

$rubro = new Rubro();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
    $rubro->add($nombre);
    header('Location: ../listarubros.php');
    exit;
} else {
    echo '<script>alert("Error: No se pudo guardar el registro.");</script>';
    header('Location: ../listarubros.php');
    exit;
}
?>
