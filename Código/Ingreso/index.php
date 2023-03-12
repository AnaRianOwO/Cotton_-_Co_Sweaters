<?php
    error_reporting(0);
    session_start();
    $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
    if(!empty($sessData['status']['msg'])){
        $statusMsg = $sessData['status']['msg'];
        $statusMsgType = $sessData['status']['type'];
        unset($_SESSION['sessData']['status']);
    }

    if(isset($_SESSION['idUsuario'])){
        header("Location: Perfil/Usu_Per/index.php");
    }else{

    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ingreso Cotton & co Sweaters</title>
     <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <link rel="stylesheet" href="CSS/login.css">
    
</head>
<body>
    <div class="cajafuera">
    <div class="formulariocaja">
        <div class="botondeintercambiar">
            <div id="btnvai"></div>
             <button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Usuario</button>
             <button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnregistrar">Admin</button>
		</div>
		<!--Formulario para el usuario -->
        <form id="frmlogin" class="grupo-entradas" method="POST" action="ingresar.php">
		<div class="logovai"><img src="https://media.discordapp.net/attachments/1015677011961860167/1015677963708141718/usuario.png"></div>
		<b>&#128231; Correo</b>
        <input type="email" class="cajaentradatexto" name="correo" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu correo')">
		<b>&#128274; Contraseña</b>
        <input type="password" class="cajaentradatexto" name="pass" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu contraseña')">
        <div class="checkboxvai"><a class="" data-bs-toggle="modal" data-bs-target="#recuperarPass">Recuperar contraseña</a></div> 
        <div class="checkboxvai"><a class="" href="../Registro/index.php">¿No tienes cuenta? Ingresa Aquí</a></div> 
        <button type="submit" class="botonenviar" name="btn_login">Iniciar sesión</button>
        </form>
		<!--Formulario para admin -->
        <form id="frmregistrar" class="grupo-entradas" method="POST" action="login_admin.php">
			<div class="logovai"><img src="https://media.discordapp.net/attachments/1015677011961860167/1015677963410358433/administrador.png"></div>
            <b>&#128231; Correo</b>
        <input type="email" class="cajaentradatexto" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu correo')" name="correo">
			<b>&#128274; Contraseña</b>
        <input type="password" class="cajaentradatexto" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu contraseña')" name="pass">
        <button type="submit" class="botonenviar" name="btn_login">Iniciar sesión</button>
        </form>
        </div>
    </div>
    
    <script>
    var x = document.getElementById("frmlogin");
    var y = document.getElementById("frmregistrar");
    var z = document.getElementById("btnvai");
	var textcolor1=document.getElementById("vaibtnlogin");
	var textcolor2=document.getElementById("vaibtnregistrar");
	textcolor1.style.color="white";
	textcolor2.style.color="black";

        function registrarvai()
		{
			
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
			textcolor1.style.color="black";
			textcolor2.style.color="white";
	
        }
            function loginvai()
		{
			
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
			textcolor1.style.color="white";
			textcolor2.style.color="black";

        }
		
</script>
<div class="modal fade" id="recuperarPass"  tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"><i class="bi bi-patch-question"></i> ¿Has olvido tu contraseña?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <p>
                <h2>Ingresa un correo para restablecer tu contraseña</h2>
                <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>

                    <form action="Restablecer/restablecer.php" method="post">
                        <table>
                            <tr> 
                            <td><b>&#128231; Correo</b></td>
                            <td><input type="email" name="correo" required class="cajaentradatexto"></td>
                            </tr>
                            <tr> 	
                            <td>
			                <input class="txtrecuperar" type="submit" name="forgotSubmit" value="Enviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo? ');">
			                </td>
                            </tr>
                        </table>
                    </form>   
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    
    <div class="burbujas">
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>

