<?php

session_start();



$idUsuario= $_GET['idUsuario'];
$conexion= mysqli_connect("localhost", "root", "", "cotton");
$consulta= "SELECT  U.docType, U.firstName, U.secondName, U.surname,
U.secondSurname, U.indicativo, U.phone, U.correo, U.direccion, C.nameCiudad, 
E.nameEstado FROM usuario U INNER JOIN ciudad C ON U.idCiudad=C.idCiudad INNER JOIN estado E On E.idEstado=U.idEstado WHERE  U.idUsuario = '$idUsuario'";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

$sqlCiudad = "SELECT * FROM ciudad ORDER BY nameCiudad ASC";
$resultadoCiudad = mysqli_query($conexion, $sqlCiudad);

$sqlEstado = "SELECT * FROM estado";
$resultadoEstado = mysqli_query($conexion, $sqlEstado);
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/es.css">
</head>

<body id="page-top">

<form  action="funciones_usuario.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br><br>
                            <h3 class="text-center">Editar usuario</h3>
                            <div class="form-group">
                                <label for="firstName" class="form-label">Primer Nombre</label>
                                <input type="text"  id="firstName" name="firstName" class="form-control" value="<?php echo $usuario['firstName'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="secondName">Segundo Nombre</label><br>
                                <input type="text" name="secondName" id="secondName" class="form-control" value="<?php echo $usuario['secondName'];?>"required>
                            </div>
                            
                            <div class="form-group">
                                <label for="surname" class="form-label">Primer Apellido </label>
                                <input type="text"  id="surname" name="surname" class="form-control" value="<?php echo $usuario['surname'];?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="secondSurname">Segundo Apellido</label><br>
                                <input type="text" name="secondSurname" id="secondSurname" class="form-control" value="<?php echo $usuario['secondSurname'];?>" required> 
                            </div>
                            <div class="form-group">
                                <label for="indicativo" class="form-label">indicativo</label>
                                <input type="text"  id="indicativo" name="indicativo" class="form-control" value="<?php echo $usuario['indicativo'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Celular</label><br>
                                <input type="tel" name="phone" id="phone" class="form-control"  value="<?php echo $usuario['phone'];?>"required>
                            </div>
                            
                            <div class="form-group">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email"  id="correo" name="correo" class="form-control" placeholder="" value="<?php echo $usuario['correo'];?>" >
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Celular</label><br>
                                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $usuario['phone'];?>" required> 
                            </div>

                            <div class="form-group">
                                <label for="direccion">Direccion</label><br>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $usuario['direccion'];?>" required> 
                            </div>

                            <div class="form-group">
                            <label for="idCiudad">Ciudad</label><br>
                                <select name="idCiudad" id="idCiudad" required>
                                    <option value="">Seleccione su ciudad</option>
                                    <?php while($row = $resultadoCiudad->fetch_assoc())
                                            {
                                                $row['idCiudad'] = "'".$row['idCiudad']."'";
                                                echo "<option value=".$row['idCiudad']; if ($row['nameCiudad']==$usuario['nameCiudad']){ echo "selected"; };
                                                echo ">".$row['nameCiudad']."</option>";
                                            }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nameEstado">Estado</label><br>
                                <select name="idEstado" id="idEstado">
                                    <option value="">Seleccione su estado</option>
                                    <?php while($row = $resultadoEstado->fetch_assoc())
                                            {
                                                $row['idEstado'] = "'".$row['idEstado']."'";
                                                echo "<option value=".$row['idEstado']; if ($row['nameEstado']==$usuario['nameEstado']){ echo "selected"; };
                                                echo ">".$row['nameEstado']."</option>";
                                            }
                                    ?>
                                </select>
                            </div>
                                
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario;?>">
                            </div>
                        
                           <br>

                                <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success" >Editar</button>
                               <a href="../usuarios.php" class="btn btn-danger">Cancelar</a>
                               
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