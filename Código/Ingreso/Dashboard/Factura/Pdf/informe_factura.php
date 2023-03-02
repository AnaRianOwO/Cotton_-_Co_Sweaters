<?php
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
    
    $this->SetFont('Arial','B',8);
    $this->Cell(20, 10, utf8_decode('Nº de factura'), 1, 0, 'C', 0);
    $this->Cell(20, 10, utf8_decode('Documento'), 1, 0, 'C', 0);
    $this->Cell(45, 10, utf8_decode('Nombre comprador'), 1, 0, 'C', 0);
    $this->Cell(22, 10, utf8_decode('Telefono'), 1, 0, 'C', 0);
    $this->Cell(28, 10, utf8_decode('Dirección'), 1, 0, 'C', 0);
    $this->Cell(30, 10, utf8_decode('Fecha y Hora'), 1, 0, 'C', 0);
    $this->Cell(25, 10, utf8_decode('Total Compra'), 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

require ('../../../../DB/db.php');
$consulta= "SELECT * FROM persona P INNER JOIN usuario U on U.id_persona=P.id_persona INNER JOIN factura F ON U.idUsuario = F.idUsuario;;"; 
$resultado =$DB->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(20, 10, utf8_decode($row['idFactura']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['id_persona']), 1, 0, 'C', 0);
    $pdf->Cell(45, 10, utf8_decode($row['firstName']." ".$row['secondName']." ".$row['surname']." ".$row['secondSurname']), 1, 0, 'C', 0);
    $pdf->Cell(22, 10, utf8_decode($row['phone']), 1, 0, 'C', 0);
    $pdf->Cell(28, 10, utf8_decode($row['direccion']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['fecha']), 1, 0, 'C', 0);
    $pdf->Cell(25, 10, utf8_decode('$ '.$row['total']), 1, 1, 'C', 0);
}

$pdf->Output();
?>