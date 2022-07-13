<?php
    include("conexion.php");
    $con=conectar();

    $sql="SELECT * FROM usuario";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <h1>Ingrese datos</h1>
                <form action="insertar.php" method="POST" autocomplete="off">

                    <input type="text" class="form-control mb-3" name="numeroDocumento" placeholder="Documento">
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                    <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido">
                    <input type="text" class="form-control mb-3" name="celular" placeholder="Celular">
                    <input type="text" class="form-control mb-3" name="correo" placeholder="Correo">
                    <input type="text" class="form-control mb-3" name="clave" placeholder="Clave">
                                    
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Numero de Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Celular</th>
                                        <th>Correo</th>
                                        <th>idEstado</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['numeroDocumento']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['apellido']?></th>
                                                <th><?php  echo $row['celular']?></th>
                                                <th><?php  echo $row['correo']?></th>
                                                <th><?php  echo $row['idEstado']?></th>
                                                <th><a href="actualizar.php?id=<?php echo $row['numeroDocumento'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['numeroDocumento'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
        </div>

    </div>
</body>
</html>