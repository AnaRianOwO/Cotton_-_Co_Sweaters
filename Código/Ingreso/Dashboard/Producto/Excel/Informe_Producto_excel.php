<?php
require_once ('../../../../DB/db.php');
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Reporte_Productos_" . date('Y:m:d').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");
?>

<table border= 1xp class="table table-striped table-dark " id= "table_id" aria-label="tabla de excel para los preoductos">
	<thead>    
		<tr>
			<th>Codigo</th>
        	<th>Numbre Producto</th>
        	<th>Precio</th>
        	<th>Stock</th>
        	<th>Descripcion</th>
        	<th>Estado</th>
    	</tr>
	</thead>
<tbody>

<?php
               
$SQL="SELECT * FROM producto P INNER JOIN estado E On E.idEstado=P.idEstado;";
$dato = mysqli_query($DB, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
	<td><?php echo utf8_decode($fila['codigo']); ?></td>
	<td><?php echo utf8_decode($fila['nameProducto']); ?></td>
	<td><?php echo utf8_decode('$ '.$fila['precio']); ?></td>
	<td><?php echo utf8_decode($fila['stock']); ?></td>
	<td><?php echo utf8_decode($fila['descripcion']); ?></td>
	<td><?php echo utf8_decode($fila['nameEstado']); ?></td>
</tr>
<?php
}
}
?>