<?php
if(!isset($_GET["ref"])){
    die();
}

include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/resources/fpdf/fpdf.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/BD/Conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Controllers/VendedoresController.php';
$conection = new MySQLConexion;

$conn = $conection->getConexion();

$vendedoresController = new VendedoresController($conn);

$result = $vendedoresController->getVenta($_GET["ref"]);
$row = $result->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage('P','Letter');
$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Evento: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["NombreEvento"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Descripcion: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["DescripcionEvento"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Fecha de inicio: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["FechaInicioEvento"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Fecha de termino: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["FechaFinEvento"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Lugar: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["DetalleLugar"]."'),0,0,'R');
$pdf->Ln();

$pdf->Cell(50,0,utf8_decode('Nombre del vendedor: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["NombreVendedor"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Correo de contacto: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["EmailVendedor"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Telefono de contacto: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["TelefonoVendedor"]."'),0,0,'R');
$pdf->Ln();

$pdf->Cell(50,0,utf8_decode('Nombre del cliente: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["NombreCliente"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Apellido Paterno: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["ApellidoPCliente"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Apellido Materno: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["ApellidoMCliente"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Correo: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["EmailCliente"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Celular: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["CelularCliente"]."'),0,0,'R');
$pdf->Ln();

$pdf->Cell(50,0,utf8_decode('Fecha de la venta: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["FechaVenta"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Costo boleto: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["CostoEvento"]."'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Lugares: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('x   ".$row["NoViajerosVenta"]."'),'B',0,'R');
$pdf->Ln();
$pdf->Cell(50,0,utf8_decode('Total: '),0,1,'L');
$pdf->Cell(50,0,utf8_decode('".$row["Total"]."'),0,0,'R');
$pdf->Ln();

$pdf->Output();
?>