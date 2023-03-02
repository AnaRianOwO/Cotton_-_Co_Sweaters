<?php
require_once ("../../../../DB/db.php");
header("Content-Type: application/xls");
date_default_timezone_set('America/Bogota');
header("Content-Disposition: attachment; filename=Reporte_Factura_" . date('Y:m:d').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");
?>
<meta charset="UTF-8">
<table border= 1xp class="table table-striped table-dark " id= "table_id">
	<thead>    
		<tr>
			<th>Nº de factura</th>
			<th>Documento</th>
			<th>Nombre comprador</th>
			<th>Telefono</th>
			<th>Dirección</th>
			<th>Fecha y Hora</th>
			<th>Total Compra</th>
    	</tr>
	</thead>
<tbody>

<?php
               
$consulta= "SELECT * FROM factura F INNER JOIN usuario U ON U.idUsuario = F.idUsuario INNER JOIN persona P on U.id_persona = P.id_persona;";
$dato = mysqli_query($DB, $consulta);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
	<td><?php echo $fila['idFactura']; ?></td>
	<td><?php echo utf8_decode($fila['idUsuario']); ?></td>
	<td><?php echo utf8_decode($fila['firstName'])." ".utf8_decode($fila['secondName'])." ".utf8_decode($fila['surname'])." ".utf8_decode($fila['secondSurname']); ?></td>
	<td><?php echo utf8_decode($fila['phone']); ?></td>
	<td><?php echo utf8_decode($fila['direccion']); ?></td>
	<td><?php echo utf8_decode($fila['fecha']); ?></td>
	<td><?php echo utf8_decode('$ '.$fila['total']); ?></td>
</tr>
<?php
}
}
?>