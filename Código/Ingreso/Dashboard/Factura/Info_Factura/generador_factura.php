<?php
    $idFactura= $_GET['idFactura'];
    // Conexion con Base de datos
    include("../../../../DB/db.php");
	// Conexion con Libreria
    require "./code128.php";

    

    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();

	// Consulta SQL
	// $consulta = "SELECT P.codigo,P.nameProducto,P.descripcion,U.idUsuario,U.docType,U.firstName,U.secondName,U.surname,U.secondSurname,
    // U.phone,U.direccion,P.precio,D.cantidad,F.fecha,F.total,F.idFactura FROM factura F INNER JOIN detallefactura D on F.idFactura=D.idFactura 
    // INNER JOIN producto P on P.codigo=D.codigo INNER JOIN usuario U on F.idUsuario=U.idUsuario WHERE F.idFactura='$idFactura'";
    $consulta = "SELECT * FROM usuario U INNER JOIN factura F on U.idUsuario=F.idUsuario WHERE F.idFactura='$idFactura'";
	$resultado= $DB->query($consulta);
	$Administrador = mysqli_fetch_assoc($resultado);

    // Logo de la empresa 
	$pdf->Image('https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png',25,7,30,28,'PNG');

    $pdf->Ln(27);
    // Fuente de texto, Negrilla y Tamaño 
    $pdf->SetFont('Arial','B',12);
    // Nombre Empresa
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Cotton and co Sweaters")),0,'C',false);
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',10);
    // Datos Empresa
    $pdf->MultiCell(0,5,utf8_decode("NIT: 900.469.230-6"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Direccion: Cra. 10 #37, Bogota"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: +57 314 3767251"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: cottoncosweattt@gmail.com"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(7);
    // Fecha y Hora de la Generacion de la Factura
    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".$Administrador["fecha"]),0,'C',false);
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',10);
    // Numero de la Factura
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Numero de Factura")),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode($Administrador["idFactura"]),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Informacion Cliente")),0,'C',false);

    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode("Nombres: ".$Administrador["firstName"]." ".$Administrador["secondName"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Apellidos: ".$Administrador["surname"]." ".$Administrador["secondSurname"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Documento: ".$Administrador["idUsuario"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ".$Administrador["phone"]),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Direccion: ".$Administrador["direccion"]),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    // Tabla de productos 
    # Tabla de productos #
    // $pdf->MultiCell(0,4,utf8_decode($Administrador["nameProducto"]),0,'C',false);

    // $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    // $pdf->Ln(3);

    // Encabezado Tabla
    $pdf->Cell(25,5,utf8_decode("Cant."),0,0,'C');
    $pdf->Cell(16,5,utf8_decode("Precio"),0,0,'C');
    //$pdf->Cell(18,5,utf8_decode("Desc."),0,0,'C');
    $pdf->Cell(29,5,utf8_decode("Total"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $elSql = mysqli_query($DB, "SELECT * FROM detallefactura D INNER JOIN factura F on F.idFactura=D.idFactura INNER JOIN producto P on P.codigo=D.codigo WHERE F.idFactura='$idFactura'");
    $datos = 
    $rowss = mysqli_num_rows($elSql);
    if($rowss > 0){
        while ($data = mysqli_fetch_array($elSql)) {
            $pdf->Ln(1);
            $pdf->MultiCell(0,4,utf8_decode($data["nameProducto"]),0,'C',false);
            
            
            // $pdf->Cell(23,4,utf8_decode($data['cantidad']),0,0,'C');
            // Contenido Tabla
            $pdf->Cell(23,4,utf8_decode($data["cantidad"]),0,0,'C');
            $pdf->Cell(20,4,utf8_decode("$ ".$data["precio"]),0,0,'C');
            //$pdf->Cell(13,4,utf8_decode("50%"),0,0,'C');
            $precio = $data['cantidad']*$data['precio'];
            $pdf->Cell(24,4,utf8_decode("$ ".$precio),0,0,'C');
            $pdf->Ln(5);
        }
    }
    
    

    $pdf->Cell(72,5,utf8_decode("------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(20,5,utf8_decode("TOTAL A PAGAR:   "),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$ ".$Administrador["total"]),0,0,'C');

    $pdf->Ln(12);

    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,7,utf8_decode("¡Gracias por su compra!"),'',0,'C');

    $pdf->Ln(15);

    // Codigo de barras
    $pdf->Code128(8,$pdf->GetY(),"COD000001V0001",65,18);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',12);
    $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);
    
    // Nombre del archivo PDF 
    $pdf->Output("I","Factura_Compra.pdf",true);