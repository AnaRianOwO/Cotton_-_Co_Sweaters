<?php
require_once ('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página

public function Header()
{
    // Logo
    //$this->Image('https://media.discordapp.net/attachments/980648436275753030/987080826493751406/Logo.png?width=625&height=625',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de Producto',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->SetFont('Arial','B',8);
    $this->Cell(15, 10, 'Codigo', 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Numbre Producto', 1, 0, 'C', 0);
    $this->Cell(25, 10, 'Precio', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Stock', 1, 0, 'C', 0);
    $this->Cell(70, 10, 'Descripcion', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Estado', 1, 1, 'C', 0);
}

// Pie de página
public function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

require_once ('../../../../DB/db.php');
$SQL="SELECT * FROM producto P INNER JOIN estado E On E.idEstado=P.idEstado;";
$resultado =$DB->query($SQL);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(15, 10, utf8_decode($row['codigo']), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($row['nameProducto']), 1, 0, 'C', 0);
    $pdf->Cell(25, 10, utf8_decode('$ '.$row['precio']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, utf8_decode($row['stock']), 1, 0, 'C', 0);
    $pdf->Cell(70, 10, utf8_decode($row['descripcion']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, utf8_decode($row['nameEstado']), 1, 1, 'C', 0);
}

$pdf->Output();
?>