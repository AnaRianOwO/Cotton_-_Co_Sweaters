<html>

</html>
<?php

include("../DB/db.php");
$sqlCiudad = "SELECT * FROM ciudad ORDER BY nameCiudad ASC";
$resultadoCiudad = mysqli_query($DB, $sqlCiudad);

$sqlEstado = "SELECT * FROM estado";
$resultadoEstado = mysqli_query($DB, $sqlEstado);


include "TyC/terminosyCondiciones.html";
include "registrar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="TyC/estilos.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <title>Registro</title>
</head>
<body>

    

                <form action="registrar.php" method="POST" class="form">

                    <center><h2>Registro</h2></center>
                    <div class="content-select">
                        <select name="docType" class="content-select" required="" oninvalid="this.setCustomValidity(' Por favor selecciona tu tipo de documento')">
                            <option>Seleccione tipo de documento</option>
                            <option value="Cedula de ciudadania">Cédula de ciudadanía</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Cedula de extranjeria">Cédula de extranjería</option>
                        </select>
                        <i></i>
                    </div>  
                    
                    <input type="number" class="" name="idUsuario" placeholder="NIT" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu número de documento')">
                    <input type="text" class="" name="name" placeholder="Nombre" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu nombre')">
                    <input type="text" class="" name="secondName" placeholder="Segundo nombre">
                    <input type="text" class="" name="surname" placeholder="Apellido" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu apellido')" >
                    <input type="text" class="" name="secondSurname" placeholder="Segundo apellido">
               
    
                    <div class="content-select">
                        <select name="idCiudad" id="idCiudad" required class="content-select">
                            <option value="">Seleccione su ciudad</option>
                                <?php while($row = $resultadoCiudad->fetch_assoc())
                                    {
                                        echo "<option value=".$row['idCiudad'].">".$row['nameCiudad']."</option>";
                                    }
                                ?>
                        </select>
                        <i></i>
                    </div>
    
                    <input type="text" class="" name="indicativo" placeholder="Indicativo del celular" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu el indicativo de tu numero de celular')">
                    <input type="number" class="" name="phone" placeholder="Celular" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu número de celular')">
                    <input type="text" class="" name="direccion" placeholder="Dirrección" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu dirección')">
                    <input type="email" class="" name="correo" placeholder="Correo electrónico" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu correo')">
                    <input type="password" class="" name="pass" placeholder="Contraseña" required="" oninvalid="this.setCustomValidity(' Por favor introduce tu contraseña')">            
                    
                    <a href="#" class="TyC"><center>Acepta los términos y condiciones antes de terminar</center></a>
                    <p><center><a href="../Ingreso/index.php">¿Ya tienes cuenta?</a></center></p>
                    

                    <input type="submit" class="TyC btn btn-primary" name="btn_registrar" id="btn_registrar" value="Registrar" disabled>
                </form>
                <div class="tapa">
                    <h1>Cotton & Co Sweaters</h1>
                </div>


            
            <div class="banner_img">
                <img src="ropa.png" alt="">
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
    <script src="script.js"></script>
</body>

<script src="TyC/funciones.js"></script>
</html>