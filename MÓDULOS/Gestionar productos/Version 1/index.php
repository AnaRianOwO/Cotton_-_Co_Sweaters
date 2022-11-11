<?php 
    include("../conexion.php");


    $sql="SELECT *  FROM producto";
    $query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                            <form action="insertar.php" method="POST" enctype="multipart/form-data">

                                <input type="text" class="form-control mb-3" name="codigo" placeholder="Numero del producto">
                                <input type="text" class="form-control mb-3" name="nameProducto" placeholder="Nombre del producto">
                                <input type="text" class="form-control mb-3" name="precio" placeholder="Precio unitario">
                                <input type="text" class="form-control mb-3" name="stock" placeholder="Actualmemnte en stock">
                                <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion">
                                <input type="text" class="form-control mb-3" name="talla" placeholder="Talla">
                                <input type="file" class="form-control mb-3" name="imagen" id="Img" require>
                                    
                                <input type="submit" class="btn btn-primary">
                            </form>
                        </div>

                        <div class="col-md-8">
                            <h1>Datos guardados</h1>
                            <table>
                                <tr>
                                    <th>Codgo  </th>
                                    <th>Nombre  </th>
                                    <th>Precio    </th>
                                    <th>Stock  </th>
                                    <th>Descripcion     </th>
                                    <th>Talla   </th>
                                    <th>imagen      </th>
                                    <th>Estado      </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php
                                    $query = mysqli_query($con, "SELECT * FROM producto;");
                                    $result =mysqli_num_rows($query);
                                    if($result>0){
                                        while($data = mysqli_fetch_array($query)){
                                            ?>
                                            <tr>
                                                <td><?php echo $data['codigo'] ?></td>
                                                <td><?php echo $data['nameProducto'] ?></td>
                                                <td><?php echo $data['precio'] ?></td>
                                                <td><?php echo $data['stock'] ?></td>
                                                <td><?php echo $data['descripcion'] ?></td>
                                                <td><?php echo $data['talla'] ?></td>
                                                <td><img height="50px" src="data:image/jpg;base64, <?php echo base64_encode($data['imagen']) ?>"></td>
                                                <td><?php echo $data['idEstado'] ?></td>
                                                <th><a href="actualizar.php?id=<?php echo $data['codigo'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $data['codigo'] ?>" class="btn btn-danger">Eliminar</a></th>
                                            </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>


