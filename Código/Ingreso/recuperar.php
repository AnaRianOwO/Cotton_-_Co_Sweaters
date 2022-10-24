<?php
	include '../DB/db.php';

	$correo = $_POST['correo'];

	$query_usuario = mysqli_query($DB, "SELECT * FROM usuario WHERE correo = '$correo'");
	$nr = mysqli_num_rows($query_usuario);

	if($nr == 1){
		
		$mostrar = mysqli_fetch_array($query_usuario);
		$enviar_pass = $mostrar['pass'];

		$paracorreo = $correo;
		$titulo = "Recuperar Password";
		$mensaje = "Tu contraseña es: http://localhost/CottonA/ ";
		$tucorreo = "From: cottoncosweattt@gmail.com";

		if(mail($paracorreo, $titulo, $mensaje, $tucorreo)){
			echo "<script>alert('Contraseña enviada');window.location= 'index.php' </script>";
		}else{
			echo "<script>alert('Error');window.location= 'index.php' </script>";
		}
	}
	else{
			echo "<script>alert('Este correo no exite');window.location= 'index.php' </script>";
		}


?>