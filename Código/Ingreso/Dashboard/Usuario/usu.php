
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    

<title>Usuarios</title>
</head>
<br>
<div class="container is-fluid">


<div class="col-xs-12">
  		<center><h1>Bienvenido Administrador</h1></center>
      <br>
		<h1>Lista de usuarios</h1>
    <br>
		<div>

       <a class="btn btn-primary1" href="../Excel/Informe_Usuario_excel.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
  					<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
				</svg><b>Excel</b>

       </a>
       <a href="../Pdf/informe_usuarios.php" class="btn btn-primary2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
  					<path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
  					<path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
				</svg><b>PDF</b> </a>

        <button type="button" class="btn btn-success1" data-toggle="modal" data-target="#create">
				<span class="glyphicon glyphicon-plus"></span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg> <b>Crear</b> </a></button>
		</div>

           <br>


			</form>
      <div class="container-fluid">
      <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="">
      <hr>
      </form>
  </div>

  <br>

      <table class="table table-striped table-dark table_id " id="table_id">
                        <thead>    
                        <tr>
                        <th>Número de identidad</th>
                        <th>Tipo de Documento</th>
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
                        <th><?php echo $fila['idUsuario']?></th>
                        <th><?php echo $fila['docType']?></th>
                        <th><?php echo $fila['firstName']?></th>
                        <th><?php echo $fila['secondName']?></th>
                        <th><?php echo $fila['surname']?></th>
                        <th><?php echo $fila['secondSurname']?></th>
                        <th><?php echo $fila['indicativo']?></th>
                        <th><?php echo $fila['phone']?></th>
                        <th><?php echo $fila['correo']?></th>
                        <th><?php echo $fila['direccion']?></th>
                        <th><?php echo $fila['nameCiudad']?></th>
                        <th><?php echo $fila['nameEstado']?></th>


<td>


<a class="btn btn-warning" href="editar_usuario.php?idUsuario=<?php echo $fila['idUsuario']?> ">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
</svg>

  <a class="btn btn-danger btn-del"  href="eliminar_usuario.php?idUsuario=<?php echo $fila['idUsuario']?>">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg>

</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>
    <?php   
}
?>
	</body>
  </table>

  <script>
$('.btn-del').on('click', function(e){
  e.preventDefault();
  const href = $(this).attr('href')

  Swal.fire({
  title: 'Estas seguro de eliminar este usuario?',
  text: "¡No podrás revertir esto!!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Eliminar', 
  cancelButtonText: 'Cancelar', 
}).then((result)=>{
    if(result.value){
        if (result.isConfirmed) {
    Swal.fire(
      'Eliminado!',
      'El usuario fue eliminado.',
      'success'
    )
  }

        document.location.href= href;
    }   

})
})

  </script>  


  
<!--Fecha y Reloj-->  
<br>
<?php include "Tablas/Fecha.php"?>
<center>
<p class="ml-auto"><strong> Colombia </strong><?php echo fecha(); ?></p>
<div class="reloj">
  <h5><span id="tiempo">00 : 00 : 00</span></h5>
</div>
</center>
<br>

<div id="paginador" class=""></div>
<script src="package/dist/sweetalert2.all.js"></script>
<script src="package/dist/sweetalert2.all.min.js"></script>
<script src="package/jquery-3.6.0.min.js"></script>

<script src="js/buscador.js"></script>
<script src="js/reloj.js"></script>




		<?php include('Tablas/insertar_usuario.php'); ?>
</html>