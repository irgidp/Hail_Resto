<?php
// include('koneksi.php');
// require 'functions.php';

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'no_pembayaran')
    ->setCellValue('B1', 'no_pesanan')
    ->setCellValue('C1', 'id_pegawai')
    ->setCellValue('D1', 'total_harga');

$column = 2;

$query = mysqli_query($conn, "SELECT * FROM pembayaran");
$res = $query->fetch_all(MYSQLI_ASSOC);

foreach ($res as $row) {
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $row['no_pembayaran'])
        ->setCellValue('B' . $column, $row['no_pesanan'])
        ->setCellValue('C' . $column, $row['id_pegawai'])
        ->setCellValue('D' . $column, $row['total_harga']);

    $column++;
}

$writer = new Xlsx($spreadsheet);

$filename = date('Y-m-d') . '-Data-Pembayaran';

ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
header('Cache-Control: max-age=0');

$writer->save('php://output');
