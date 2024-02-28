<?php
require "connect.php";
require('tfpdf/tfpdf.php');

$sql = "SELECT * FROM hoatdong";
$query = mysqli_query($conn, $sql);

$pdf = new tFPDF();
$pdf->AddPage('0');
$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('DejaVu', '', 10);
// Add table header
$pdf->Cell(10, 20, 'STT', 1);
$pdf->Cell(80, 20, 'Tên hoạt động', 1);
$pdf->Cell(80, 20, 'Địa điểm', 1);
$pdf->Cell(30, 20, 'Mô tả', 1);
$pdf->Cell(30, 20, 'Thời gian', 1);
$pdf->Cell(15, 20, 'Số lượng', 1);
$pdf->Ln(); // Move to the next line

// Fill data into the table
$stt = 0;
while ($row = mysqli_fetch_array($query)) {
    $pdf->Cell(10, 20, $stt, 1);
    $pdf->Cell(80, 20, $row['tenHoatDong'], 1);
    $pdf->Cell(80, 20, $row['diaDiem'], 1);
    $pdf->Cell(30, 20, $row['moTa'], 1);
    $pdf->Cell(30, 20, $row['thoiGian'], 1);
    $pdf->Cell(15, 20, $row['soLuong'], 1);
    $pdf->Ln(); // Move to the next line
}
$pdfFileName = 'danhsachhoatdong.pdf';

// Save the PDF to the file
$pdf->Output($pdfFileName, 'F');

// Set content type and force download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $pdfFileName . '"');

// Output the PDF to the browser
readfile($pdfFileName);
