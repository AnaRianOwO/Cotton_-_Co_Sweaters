<?php
require_once ("../../../../DB/db.php");
header("Content-Type: application/xls");
date_default_timezone_set('America/Bogota');
header("Content-Disposition: attachment; filename=Reporte_Administradores_" . date('Y:m:d').".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border= 1xp class="table table-striped table-dark " id= "table_id" aria-label="tabla de excel para los administradores">
	<thead>
		<tr>
			<th>Numero Documento</th>
        	<th>Tipo Documento</th>
        	<th>Primer Nombre</th>
        	<th>Segundo Nombre</th>
        	<th>Primer Apellido</th>
        	<th>segundo Apellido</th>
        	<th>indicativo</th>
        	<th>celular</th>
        	<th>correo</th>
        	<th>direccion</th>
        	<th>Ciudad</th>
        	<th>Estado</th>
    	</tr>
	</thead>
<tbody>

<?php
   
$SQL="SELECT A.idAdministrador, A.docType, A.firstName, A.secondName, A.surname,
A.secondSurname, A.indicativo, A.phone, A.correo, A.direccion, C.nameCiudad, 
E.nameEstado FROM administrador A INNER JOIN ciudad C ON A.idCiudad=C.idCiudad INNER JOIN estado E On E.idEstado=A.idEstado;";
$dato = mysqli_query($DB, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
	<td><?php echo $fila['idAdministrador']; ?></td>
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
	<td><?php echo utf8_decode($fila['nameEstado']); ?></td>
</tr>
<?php
}
}
?>