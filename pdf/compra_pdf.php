<?php
error_reporting(E_ALL ^ E_WARNING);  // Suprime las advertencias pero muestra todos los errores
ob_start();  // Inicia el almacenamiento en búfer de salida

require_once '../class/class.compras.php';  // Incluye la clase Compra
$factura = new Compra();  // Crea una instancia de la clase Compra

require_once '../class/class.detallecompras.php';  // Incluye la clase DetalleCompra
$JSONdetalle = new DetalleCompra();  // Crea una instancia de la clase DetalleCompra

session_start();  // Inicia la sesión
$sesion = $_SESSION['usuario'];  // Obtiene el nombre del usuario desde la sesión

// Obtiene los detalles de la compra para el usuario actual
$arrDetalles = $JSONdetalle->getDetalles($sesion);
$count = 0;
foreach ($arrDetalles as $detalle) { 
    $count++;  // Cuenta cuántos artículos se han agregado a la compra
}

if ($count == 0) {  // Si no hay artículos agregados a la compra
    echo "<script>alert('No hay articulos agregados a la compra')</script>";
    echo "<script>window.close();</script>";  // Muestra un mensaje y cierra la ventana
    exit;  // Detiene la ejecución del código
}

require_once dirname(__FILE__) . '/../vendor/autoload.php';  // Carga los archivos de la biblioteca externa

use Spipu\Html2Pdf\Html2Pdf;  // Usa la clase Html2Pdf de la biblioteca

// Variables recibidas por REQUEST
$numero_factura = $_REQUEST['numero'];  // Obtiene el número de factura
$idproveedor = $_REQUEST['idproveedor'];  // Obtiene el ID del proveedor
$fecha = $_REQUEST['fecha'];  // Obtiene la fecha de la compra
$estado = $_REQUEST['estado'];  // Obtiene el estado de la compra
$idusuario = $_SESSION['idUsuario'];  // Obtiene el ID del usuario desde la sesión

// Obtiene el contenido HTML de la factura
include(dirname('__FILE__') . '/documentos/compra_html.php');
$content = ob_get_clean();  // Obtiene el contenido del búfer de salida

try {
    // Inicializa la clase HTML2PDF
    $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', array(0, 0, 0, 0));
    $html2pdf->pdf->SetDisplayMode('fullpage');  // Configura el modo de visualización del PDF
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  // Escribe el contenido HTML en el PDF
    $html2pdf->Output('planillacompras' . $sesion . '.pdf');  // Envía el PDF generado para descargarlo con el nombre correspondiente
} catch (HTML2PDF_exception $e) {  // Maneja errores si ocurren
    echo $e;  // Muestra el error
    exit;  // Detiene la ejecución del código
}
?>
