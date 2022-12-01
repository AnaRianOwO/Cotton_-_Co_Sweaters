<?php
/*require('Xampp/htdocs/reporte-pdf-php/fpdf/fpdf.php');*/
require_once ('fpdf/fpdf.php');

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
    $this->Cell(30,10,'Reporte de Administrador',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->SetFont('Arial','B',7);
    $this->Cell(25, 10, 'Numero Documento', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Primer Nombre', 1, 0, 'C', 0);
    $this->Cell(25, 10, 'Segundo Nombre', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Primer Apellido', 1, 0, 'C', 0);
    $this->Cell(25, 10, 'Segundo Apellido', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Indicativo', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Celular', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Correo', 1, 1, 'C', 0);
    //$this->Cell(60, 10, 'CLave', 1, 0, 'C', 0);
    //$this->Cell(40, 10, 'Numero de Documento', 1, 1, 'C', 0);
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

require '../../../../DB/db.php';
$consulta = "SELECT * FROM administrador";
$resultado =$DB->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(25, 10, utf8_decode($row['idAdministrador']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['firstName']), 1, 0, 'C', 0);
    $pdf->Cell(25, 10, utf8_decode($row['secondName']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['surname']), 1, 0, 'C', 0);
    $pdf->Cell(25, 10, utf8_decode($row['secondSurname']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, utf8_decode($row['indicativo']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['phone']), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode($row['correo']), 1, 1, 'C', 0);
    //$pdf->Cell(40, 10, utf8_decode($row['numeroDocumento']), 1, 1, 'C', 0);
}

$pdf->Output();
?>