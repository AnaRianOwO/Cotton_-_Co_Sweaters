<?php
require_once ("../../../../DB/db.php");
header("Content-Type: application/xls");
date_default_timezone_set('America/Bogota');
header("Content-Disposition: attachment; filename=Reporte_Usuario_" . date('Y:m:d').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");
?>
<table border= 1xp class="table table-striped table-dark " id= "table_id" >
	<thead>    
		<tr>
			<th>Numero Documento</th>
        	<th>Tipo Documento</th>
        	<th>Primer Nombre</th>
        	<th>Segundo Nombre</th>
        	<th>Primer Apellido</th>
        	<th>Segundo Apellido</th>
        	<th>Indicativo</th>
        	<th>Celular</th>
        	<th>Correo</th>
        	<th>Direccion</th>
        	<th>Ciudad</th>
			<th>Estado</th>
    	</tr>
	</thead>
<tbody align="center">

<?php
               
$SQL="SELECT * FROM usuario U INNER JOIN persona P on U.id_persona=P.id_persona INNER JOIN ciudad C ON P.idCiudad=C.idCiudad";
$dato = mysqli_query($DB, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
	<td><?php echo $fila['id_persona']; ?></td>
	<td><?php echo utf8_decode($fila['docType']); ?></td>
	<td><?php echo utf8_decode($fila['firstName']); ?></td>
	<td><?php echo utf8_decode($fila['secondName']); ?></td>
	<td><?php echo utf8_decode($fila['surname']); ?></td>
	<td><?php echo utf8_decode($fila['secondSurname']); ?></td>
	<td><?php echo $fila['indicativo']; ?></td>
	<td><?php echo $fila['phone']; ?></td>
	<td><?php echo utf8_decode($fila['correo']); ?></td>
	<td><?php echo utf8_decode($fila['direccion']); ?></td>
	<td><?php echo utf8_decode($fila['nameCiudad']); ?></td>
	<td><?php echo utf8_decode($fila['idEstado']); ?></td>
</tr>
<?php
}
}
?>