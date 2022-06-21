<?php
/*require('Xampp/htdocs/reporte-pdf-php/fpdf/fpdf.php');*/
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('https://media.discordapp.net/attachments/980648436275753030/987080826493751406/Logo.png?width=625&height=625',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de Ventas',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->SetFont('Arial','B',18);
    $this->Cell(30, 10, 'Id', 1, 0, 'C', 0);
    $this->Cell(90, 10, 'Cantidad de Productos', 1, 0, 'C', 0);
    $this->Cell(70, 10, 'Subtotal de Venta', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexion.php';
$consulta = "SELECT * FROM detalleventa";
$resultado =$mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(30, 10, utf8_decode($row['idDetalleVenta']), 1, 0, 'C', 0);
    $pdf->Cell(90, 10, utf8_decode($row['cantidadProductos']), 1, 0, 'C', 0);
    $pdf->Cell(70, 10, utf8_decode($row['subtotalDetalleVenta']), 1, 1, 'C', 0);
}

$pdf->Output();
?>