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
        <link rel="stylesheet" href="./package/dist/sweetalert2.css">
        <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    </head>
    
    <body id="page-top">
        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Registro de Administradores</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  action="" method="POST">
                                <div class="form-group">
                                    <label for="idAdministrador" class="form-label">Numero de Documento</label>
                                    <input type="number"  id="idUsuario" name="idUsuario" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="docType" class="form-label">Tipo de Documento</label>
                                    <input type="text"  id="docType" name="docType" class="form-control" required>
                                </div>
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
                                <div class="form-group">
                                    <label for="ciudad" class="form-label">Direccion</label>
                                    <select name="idCiudad" id="idCiudad" required>
                                        <option value="">Seleccione su ciudad</option>
                                        <?php while($row = $resultadoCiudad->fetch_assoc())
                                                {
                                                    echo "<option value=".$row['idCiudad'].">".$row['nameCiudad']."</option>";
                                                }
                                        ?>
                                    </select>
                                </div>
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
                                <div class="form-group">
                                    <label for="pass">Contraseña:</label><br>
                                    <input type="password" name="pass" id="pass" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar"class="btn btn-success" 
                               name="registrar">
                               <a href="../../Administrador/administrador.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                                        }
                                    });		
                                });
                            </script>
    </body>
</html>