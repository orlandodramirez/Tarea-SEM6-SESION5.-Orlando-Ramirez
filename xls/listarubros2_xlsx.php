<?php
include '../class/class.rubros.php';
$rubro = new Rubro();
$resultado = $rubro->getRubros();

require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

$tableHead = [
    'font' => [
        'color' => ['rgb' => 'FFFFFF'],
        'bold' => true,
        'size' => 16
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'DC7633']
    ],
];

$evenRow = [
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'EDBB99']
    ]
];

$oddRow = [
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'FBEEE6']
    ]
];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Arial')
    ->setSize(12);

$spreadsheet->getActiveSheet()
    ->setCellValue('B1', "Listado de Rubros");

$spreadsheet->getActiveSheet()->mergeCells("B1:C1");

$spreadsheet->getActiveSheet()->getStyle('B1')->getFont()->setSize(20);

$spreadsheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40);

$spreadsheet->getActiveSheet()
    ->setCellValue('B2', "Código")
    ->setCellValue('C2', "Nombre");

$spreadsheet->getActiveSheet()->getStyle('B2:C2')->applyFromArray($tableHead);

$row = 3;
foreach ($resultado as $registro) {
    $spreadsheet->getActiveSheet()
        ->setCellValue('B' . $row, $registro['idRubro'])
        ->setCellValue('C' . $row, $registro['nombre']);

    if ($row % 2 == 0) {
        $spreadsheet->getActiveSheet()->getStyle('B' . $row . ':C' . $row)->applyFromArray($evenRow);
    } else {
        $spreadsheet->getActiveSheet()->getStyle('B' . $row . ':C' . $row)->applyFromArray($oddRow);
    }
    $row++;
}

$firstRow = 2;
$lastRow = $row - 1;
$spreadsheet->getActiveSheet()->setAutoFilter("B" . $firstRow . ":C" . $lastRow);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadorubros.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>
