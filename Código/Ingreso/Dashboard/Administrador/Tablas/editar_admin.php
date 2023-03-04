<?php
include("../../../../DB/db.php");

$idAdministrador= $_GET['idAdministrador'];

//$consulta= "SELECT A.docType, A.firstName, A.secondName, A.surname,
//A.secondSurname, A.indicativo, A.phone, A.correo, A.direccion, C.nameCiudad, 
//E.nameEstado FROM administrador A INNER JOIN ciudad C ON A.idCiudad=C.idCiudad INNER JOIN estado E On E.idEstado=A.idEstado WHERE A.idAdministrador = '$idAdministrador'";

$consulta= "SELECT * FROM administrador A INNER JOIN persona P on A.id_persona=P.id_persona INNER JOIN ciudad C ON P.idCiudad=C.idCiudad WHERE A.idAdministrador = '$idAdministrador'";
$resultado = mysqli_query($DB, $consulta);
$administrador = mysqli_fetch_assoc($resultado);

$sqlCiudad = "SELECT * FROM ciudad ORDER BY nameCiudad ASC";
$resultadoCiudad = mysqli_query($DB, $sqlCiudad);

//$sqlEstado = "SELECT * FROM estado";
//$resultadoEstado = mysqli_query($DB, $sqlEstado);
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

<form  action="funciones_admin.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br><br>
                            <h3 class="text-center">Editar Administrador</h3>
                            <div class="form-group">
                                <label for="firstName" class="form-label">Primer Nombre</label>
                                <input type="text"  id="firstName" name="firstName" class="form-control" value="<?php echo $administrador['firstName'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="secondName">Segundo Nombre</label><br>
                                <input type="text" name="secondName" id="secondName" class="form-control" value="<?php echo $administrador['secondName'];?>"required>
                            </div>
                            
                            <div class="form-group">
                                <label for="surname" class="form-label">Primer Apellido </label>
                                <input type="text"  id="surname" name="surname" class="form-control" value="<?php echo $administrador['surname'];?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="secondSurname">Segundo Apellido</label><br>
                                <input type="text" name="secondSurname" id="secondSurname" class="form-control" value="<?php echo $administrador['secondSurname'];?>" required> 
                            </div>
                            <div class="form-group">
                                <label for="indicativo" class="form-label">indicativo</label>
                                <input type="text"  id="indicativo" name="indicativo" class="form-control" value="<?php echo $administrador['indicativo'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Celular</label><br>
                                <input type="tel" name="phone" id="phone" class="form-control"  value="<?php echo $administrador['phone'];?>"required>
                            </div>
                            
                            <div class="form-group">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email"  id="correo" name="correo" class="form-control" placeholder="" value="<?php echo $administrador['correo'];?>" >
                            </div>

                            <div class="form-group">
                            <label for="idCiudad">Ciudad</label><br>
                                <select name="idCiudad" id="idCiudad" required>
                                    <option value="">Seleccione su ciudad</option>
                                    <?php while($row = $resultadoCiudad->fetch_assoc())
                                            {
                                                $row['idCiudad'] = "'".$row['idCiudad']."'";
                                                echo "<option value=".$row['idCiudad']; if ($row['nameCiudad']==$administrador['nameCiudad']){ echo "selected"; };
                                                echo ">".$row['nameCiudad']."</option>";
                                            }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nameEstado">Estado</label><br>
                                <select name="idEstado"  required>
                                    <option value="">Seleccione estado</option>
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                            </div>
                                
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="idAdministrador" value="<?php echo $idAdministrador;?>">
                            </div>
                        
                           <br>

                                <div class="mb-3">
                                    
                                <button type="submit" class="btn btn-success" >Editar</button>
                               <a href="../administrador.php" class="btn btn-danger">Cancelar</a>
                               
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