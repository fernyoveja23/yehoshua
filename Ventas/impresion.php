<?php
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/resources/fpdf/fpdf.php';

if(!isset($_GET["ref"])){
    die();
}

$pdf = new FPDF();
$pdf->AddPage('P','Letter');
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));

$pdf->Output();
?>