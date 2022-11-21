<?php
include('conexion.php');

$correo = $_POST['txtcorreo'];

$queryusuario 	= mysqli_query($conn,"SELECT * FROM login WHERE correo = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario); 
$enviarpass 	= $mostrar['pass'];

$paracorreo 		= $correo;
$titulo				= "Recuperar contraseña";
$mensaje			= $enviarpass;
$tucorreo			= "From: danielgiraldo.coper@gmail.com";
<?php
include('conexion.php');

$correo = $_POST['txtcorreo'];

$queryusuario 	= mysqli_query($conn,"SELECT * FROM login WHERE correo = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario); 
$enviarpass 	= $mostrar['pass'];

$paracorreo 		= $correo;
$titulo				= "Recuperar contraseña";
$mensaje			= $enviarpass;
$tucorreo			= "From: danielgiraldo.coper@gmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Contraseña enviado');window.location= 'index.html' </script>";
}else
{
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= 'index.html' </script>";
}
/*VaidrollTeam*/
?>
if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Contraseña enviado');window.location= 'index.html' </script>";
}else
{
	echo "<script> alert('Error');window.location= 'index.html' </script>";
}
}
else
{
	echo "<script> alert('Este correo no existe');window.location= 'index.html' </script>";
}
/*VaidrollTeam*/
?>