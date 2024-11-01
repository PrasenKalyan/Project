<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once('config.php');

$tsname = $_GET['user'];
$datatable = "add_klqot";
if (($tsname == 'admin') || ($tsname == 'durgarao') || ($tsname == 'accounts') || ($tsname == 'knbilling') || ($tsname == 'sumanthpotluri') || ($tsname == 'naiduys')) {
    $y = "SELECT * FROM knqot_bill where status='payment pending'";
} else {
    $y = "SELECT * FROM knqot_bill where status='payment pending' and user='$tsadmin'";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->mergeCells('A1:S1');
$sheet->getStyle("A1:S1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A1:S1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:S1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A4:S4');
$sheet->getStyle("A4:S4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A4:S4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'KARNATAKA TO BE RAISE  QUOTATION LIST');
$sheet->getStyle("A4:S4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'State');
$sheet->setCellValue('C6', 'Quotation No');
$sheet->setCellValue('D6', 'Supervisor');
$sheet->setCellValue('E6', 'Coordinator');
$sheet->setCellValue('F6', 'AFM');
$sheet->setCellValue('G6', 'Store Name');
$sheet->setCellValue('H6', 'Store Code');
$sheet->setCellValue('I6', 'Store Type');
$sheet->setCellValue('J6', 'City');
$sheet->setCellValue('K6', 'Ro Num');
$sheet->setCellValue('L6', 'Ro Date');
$sheet->setCellValue('M6', 'Fault Description');
$sheet->setCellValue('N6', 'Bill Received Date');
$sheet->setCellValue('O6', 'Ro Amount');
$sheet->setCellValue('P6', 'Tot Service');
$sheet->setCellValue('Q6', 'Tot Gst');
$sheet->setCellValue('R6', 'Net');
$sheet->setCellValue('S6', 'User');
$sheet->getStyle("A6:S6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getColumnDimension('B')->setWidth(8);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(15);
$sheet->getColumnDimension('J')->setWidth(15);
$sheet->getColumnDimension('K')->setWidth(15);
$sheet->getColumnDimension('L')->setWidth(15);
$sheet->getColumnDimension('M')->setWidth(15);
$sheet->getColumnDimension('N')->setWidth(15);
$sheet->getColumnDimension('O')->setWidth(15);
$sheet->getColumnDimension('P')->setWidth(15);
$sheet->getColumnDimension('Q')->setWidth(22);
$sheet->getColumnDimension('R')->setWidth(22);
$sheet->getColumnDimension('S')->setWidth(22);
$sheet->getStyle("A6:S6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error($db));
$i = 1;
$rowCount = 7;
while ($row = $result->fetch_assoc()) {
    $q = $row['quet_num'];
    $k = "select * from knrequest_amnt where quet_num='$q'";
    $result1 = $db->query($k) or die(mysqli_error($db));
    $row1 = $result1->fetch_assoc();
    $qtno = $row1['quet_num'];
    $u = "select * from add_knqot where quet_num='$qtno'";
    $result2 = $db->query($u) or die(mysqli_error($db));
    $row2 = $result2->fetch_assoc();
    $store_code = $row2['store_code'];
    $ds = "select * from dpr where store_code='$store_code'";
    $result10 = $db->query($ds) or die(mysqli_error($db));
    $row10 = $result10->fetch_assoc();
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row1['state'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($qtno, 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row10['superwisor'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row10['coordinator'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row10['afm'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row10['store_name'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($store_code, 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row10['format_type'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row10['city'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row2['ro_no'], 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row2['ro_date'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row2['falt_desc'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row['bill_date'], 'UTF-8'));
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($row2['tot_base'], 'UTF-8'));
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($row2['tot_ser'], 'UTF-8'));
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row2['tot_gst'], 'UTF-8'));
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($row2['net'], 'UTF-8'));
    $sheet->setCellValue('S' . $rowCount, mb_strtoupper($row1['user'], 'UTF-8'));

    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

$date = date('d-m-Y');
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="knraiseinvoice' . $date . '.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$writer->save('php://output');
?>
