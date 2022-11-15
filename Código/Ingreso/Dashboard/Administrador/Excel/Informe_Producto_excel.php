<?php
require_once '../../../DB/db.php';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Reporte_Productos_" . date('Y:m:d').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");
?>

<table border= 1xp class="table table-striped table-dark " id= "table_id">
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
$conexion=mysqli_connect("localhost","root","","cotton");               
$SQL="SELECT U.idUsuario, U.docType, U.firstName, U.secondName, U.surname,
U.secondSurname, U.indicativo, U.phone, U.correo, U.direccion, C.nameCiudad, 
E.nameEstado FROM usuario U INNER JOIN ciudad C ON U.idCiudad=C.idCiudad INNER JOIN estado E On E.idEstado=U.idEstado;";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
	<td><?php echo $fila['idUsuario']; ?></td>
	<td><?php echo $fila['docType']; ?></td>
	<td><?php echo $fila['firstName']; ?></td>
	<td><?php echo $fila['secondName']; ?></td>
	<td><?php echo $fila['surname']; ?></td>
	<td><?php echo $fila['secondSurname']; ?></td>
	<td><?php echo $fila['indicativo']; ?></td>
	<td><?php echo $fila['phone']; ?></td>
	<td><?php echo $fila['correo']; ?></td>
	<td><?php echo $fila['direccion']; ?></td>
	<td><?php echo $fila['nameCiudad']; ?></td>
	<td><?php echo $fila['nameEstado']; ?></td>
</tr>
<?php
}
}
?>