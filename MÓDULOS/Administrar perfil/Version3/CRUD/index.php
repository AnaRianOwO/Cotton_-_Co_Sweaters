<?php 
    include("conexion.php");
    $con=conectar();

$numeroDocumento=$_GET['id'];

$sql="SELECT * FROM usuario WHERE numeroDocumento='$numeroDocumento'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Practica</title>
</head>
<body>
    <header>

    </header>
    
    <div class="container-body">
        <div class="ventana-modal apagar">
            <div class="ventana">
                <h1>¿Enserio quieres cambiar tus datos?</h1>
                <button id="btn_si">Si, quien chuchas es david?</button>
                <button id="btn_no">No, si soy David</button>
            </div>
        </div>
        <div class="categorias">
            <div class="container-categoria">
                <ul>
                    <li id="perfil"><a href="#">Perfil</a></li>
                    <li id="pedidos"><a href="#">Pedidos</a></li>
                    <li id="favoritos"><a href="#">Favoritos</a></li>
                </ul>
            </div>
        </div>
    
        <div class="formulario" id="formulario">
            <div class="container-form">
                <form action="" autocomplete="off">
                    <h1>Formulario personal</h1>
                    <input type="text" id="nombre" name="nombre" value="Anibal" placeholder="Nombre" disabled>
                    <input type="text" id="apellido" name="apellido" value="Oviedo" placeholder="Apellido" disabled>
                    <input type="tel" id="contacto" name="contacto" placeholder="Contacto" disabled>
                    <input type="email" id="email" name="correo" value="anibal@misena.edu.co" placeholder="Correo" disabled>
                    <input type="text" id="documento" name="documento" placeholder="Documento" disabled>
                    <input type="submit" id="btnValidar" class="apagar1" value="Validar datos">
                    <input type="submit" id="btnCambiar" value="Cambiar datos">
                </form>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>