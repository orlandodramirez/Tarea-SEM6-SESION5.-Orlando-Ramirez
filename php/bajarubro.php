<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../class/class.rubros.php';

$rubro = new Rubro();

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $rubro->del($id);
    header('Location: ../listarubros.php');
    exit;
} else {
    echo '<script>alert("Error: No se borró el registro.");</script>';
    header('Location: ../listarubros.php');
    exit;
}
?>
