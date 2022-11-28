<?php
require_once ("../../../../DB/db.php");

$sqlCiudad = "SELECT * FROM ciudad ORDER BY nameCiudad ASC";
$resultadoCiudad = mysqli_query($DB, $sqlCiudad);

$sqlEstado = "SELECT * FROM estado";
$resultadoEstado = mysqli_query($DB, $sqlEstado);
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body id="page-top">

<form  action="validar_usuario.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br><br>
                            <h3 class="text-center">Registro de Usuario</h3>
                            <div class="modal-body">
                            <form  action="" method="POST">
                                <div class="form-group">
                                    <label for="idUsuario" class="form-label">Numero de Documento</label>
                                    <input type="number"  id="idUsuario" name="idUsuario" class="form-control" required>
                                </div>
                                <br>
                                <div class="content-select">
                                    <select name="docType" class="content-select" required="" oninvalid="this.setCustomValidity(' Por favor selecciona tu tipo de documento')">
                                    <option>Seleccione tipo de documento</option>
                                    <option value="Cedula de ciudadania">Cédula de ciudadanía</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="Cedula de extranjeria">Cédula de extranjería</option>
                                    </select>
                                    <i></i>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="firstName" class="form-label">Primer Nombre</label>
                                    <input type="text"  id="firstName" name="firstName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="secondName" class="form-label">Segundo Nombre</label>
                                    <input type="text"  id="secondName" name="secondName" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="surname" class="form-label">Apellido</label>
                                    <input type="text"  id="surname" name="surname" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="secondSurname" class="form-label">Segundo Apellido</label>
                                    <input type="text"  id="secondSurname" name="secondSurname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="indicativo" class="form-label">Indicativo</label>
                                    <input type="text"  id="indicativo" name="indicativo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">Celular</label>
                                    <input type="number"  id="phone" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo:</label><br>
                                    <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <input type="text"  id="direccion" name="direccion" class="form-control" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <select name="idCiudad" id="idCiudad" required>
                                        <option value="">Seleccione su ciudad</option>
                                        <?php while($row = $resultadoCiudad->fetch_assoc())
                                                {
                                                    echo "<option value=".$row['idCiudad'].">".$row['nameCiudad']."</option>";
                                                }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select name="idEstado" id="idEstado" required>
                                        <option value="">Seleccione su estado</option>
                                        <?php while($row = $resultadoEstado->fetch_assoc())
                                            {
                                                echo "<option value=".$row['idEstado'].">".$row['nameEstado']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="pass">Contraseña:</label><br>
                                    <input type="password" name="pass" id="pass" class="form-control" required>
                                </div>
                           <br>
                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar"class="btn btn-success" 
                               name="registrar">
                               <a href="../../Usuario/usuarios.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>