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
    $this->Cell(30,10,'Reporte de Usuarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->SetFont('Arial','B',8);
    $this->Cell(8, 10, 'Id', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Nombre', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Apellido', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Numero Documento', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Celular', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Fecha de Nacimiento', 1, 0, 'C', 0);
    //$this->Cell(30, 10, 'Direccion', 1, 0, 'C', 0);
    $this->Cell(42, 10, 'Correo', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Clave', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM usuario";
$resultado =$mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8.5);

while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(8, 10, utf8_decode($row['idUsuario']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, utf8_decode($row['apellido']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['numeroDocumento']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['celular']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['fechaNacimiento']), 1, 0, 'C', 0);
    //$pdf->Cell(30, 10, utf8_decode($row['direccion']), 1, 0, 'C', 0);
    $pdf->Cell(42, 10, utf8_decode($row['correo']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['clave']), 1, 1, 'C', 0);
}
$pdf->Output();
?>