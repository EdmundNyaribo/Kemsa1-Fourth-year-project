<?php
include 'db_con.php';
require('..\fpdf\fpdf.php');

$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$image = "..\images\logo.png";
$pdf->Image($image, 95, $pdf->GetY() + 1, 30);
$pdf->Ln(20);
$pdf->SetFont('Times', 'B', 15);
$pdf->cell(200, 5, 'PURCHASES RECORDS', 0, 1, 'C');
$pdf->Ln(2);
$pdf->cell(200, 5, 'PURCHASES', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 11);
$width_cell = array(30, 30, 20, 20, 50, 20);
$pdf->SetFillColor(193, 229, 252);
$pdf->Cell($width_cell[0], 10, 'PURCHASE ID', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'PRODUCT ', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'QUANTITY ', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'COST', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'CLIENT NAME.', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'STATUS', 1, 1, 'C', true);


$pdf->SetFont('Arial', '', 10);


$query = "SELECT * FROM `purchases` WHERE purchases.status = 'Approved';";

$result = mysqli_query($db_con, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $day = $row['purchase_id'];
        $stime = $row['prod_name'];
        $etime = $row['quantity'];
        $sch = $row['cost'];
        $dept = $row['client_name'];
        $unit = $row['status'];
        

        
        $pdf->cell($width_cell[0], 10, $day, 1, 0, 'C', false);
        $pdf->Cell($width_cell[1], 10, $stime, 1, 0, 'C', false);
        $pdf->Cell($width_cell[2], 10, $etime, 1, 0, 'C', false);
        $pdf->Cell($width_cell[3], 10, $sch, 1, 0, 'C', false);
        $pdf->cell($width_cell[4], 10, $dept, 1, 0, 'C', false);
        $pdf->Cell($width_cell[5], 10, $unit, 1, 1, 'C', false);
        
    }
} else {
    $pdf->Ln(2);
    $pdf->Cell(180, 10, 'NO DATA FOUND', 1, 1, 'C', true);
}



$pdf->Ln(5);

$pdf->SetFont('Times', 'BI', 8);
$pdf->cell(60, 10, 'SIGNATURE  ................................................................................................', 0, 1);
$pdf->cell(60, 10, 'Warehouse Manager.', 0, 0);
$pdf->Output();
