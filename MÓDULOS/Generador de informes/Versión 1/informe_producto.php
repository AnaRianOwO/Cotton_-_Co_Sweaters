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
    $this->Cell(30,10,'Reporte de Productos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->SetFont('Arial','B',15);
    $this->Cell(10, 10, 'Id', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Precio', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Stock', 1, 0, 'C', 0);
    $this->Cell(100, 10, 'Descripcion', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM producto";
$resultado =$mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(10, 10, utf8_decode($row['idProducto']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['nombreProducto']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['precioProducto']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['stockProducto']), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($row['descripcionProducto']), 1, 1, 'C', 0);
}

$pdf->Output();
?>
