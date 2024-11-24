<?php
include '../class/class.rubros.php';
$rubro = new Rubro();
$resultado = $rubro->getRubros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubros a Excel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">Listado de Rubros</h3>
        <br />
        <div class="table-responsive">
            <form method="POST" id="convert_form" action="listarubros_xlsx.php">
                <table class="table table-striped table-bordered" id="table_content">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultado as $fila) {
                            echo '
                            <tr>
                                <td>'.$fila["idRubro"].'</td>
                                <td>'.$fila["nombre"].'</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <input type="hidden" name="file_content" id="file_content" />
                <button type="button" name="convert" id="convert" class="btn btn-success">Descargar en Excel</button>
            </form>
            <br />
            <br />
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#convert').click(function(){
                var table_content = '<table>';
                table_content += $('#table_content').html();
                table_content += '</table>';
                $('#file_content').val(table_content);
                $('#convert_form').submit();
            });
        });
    </script>
</body>
</html>
