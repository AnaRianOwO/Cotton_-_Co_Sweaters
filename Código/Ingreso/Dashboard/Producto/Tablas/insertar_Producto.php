<?php 
    include("../../../../DB/db.php");

    $sql="SELECT *  FROM estado";
    $query=mysqli_query($DB,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Ingreso Productos</title>
        <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
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
                            <form action="validar_producto.php" method="POST" enctype="multipart/form-data">

                                <input type="text" class="form-control mb-3" name="codigo" placeholder="Código del producto">
                                <input type="text" class="form-control mb-3" name="nameProducto" placeholder="Nombre del producto">
                                <input type="text" class="form-control mb-3" name="precio" placeholder="Precio del producto">
                                <input type="text" class="form-control mb-3" name="stock" placeholder="Stock">
                                <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion">
                                <input type="file" class="form-control mb-3" name="imagen" id="Img" required>
                                <input type="text" class="form-control mb-3" name="estado" placeholder= "Estado">

                                <select name="idEstado" id="idEstado" required>
                                    <option value="">Seleccione su estado</option>
                                    <?php while($row = $query->fetch_assoc())
                                        {
                                            echo "<option value=".$row['idEstado'].">".$row['nameEstado']."</option>";
                                        }
                                    ?>
                                </select>
                                        <br>
                                        <br>
                                
                                <input type="submit" class="btn btn-primary">
                            </form>
                        </div>

                        <!--<div class="col-md-8">
                            <h1>Datos guardados</h1>
                            <table>
                                <tr>
                                    <th>Codgo  </th>
                                    <th>Nombre  </th>
                                    <th>Precio    </th>
                                    <th>Stock  </th>
                                    <th>Descripcion     </th>
                                    <th>imagen      </th>
                                    <th>Estado      </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php
                                    //$query = mysqli_query($DB, "SELECT * FROM producto;");
                                    //$result = mysqli_num_rows($query);
                                    //if($result>0){
                                        //while($data = mysqli_fetch_array($query)){
                                            ?>
                                            <tr>
                                                <td><?php //echo $data['codigo'] ?></td>
                                                <td><?php //echo $data['nameProducto'] ?></td>
                                                <td><?php //echo $data['precio'] ?></td>
                                                <td><?php //echo $data['stock'] ?></td>
                                                <td><?php //echo $data['descripcion'] ?></td>
                                                <td><img height="50px" src="data:image/jpg;base64, <?php //echo base64_encode($data['imagen']) ?>"></td>
                                                <td><?php //echo $data['idEstado'] ?></td>
                                                <th><a href="actualizar.php?id=<?php //echo $data['codigo'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php// echo $data['codigo'] ?>" class="btn btn-danger">Eliminar</a></th>
                                            </tr>
                                            <?php
                                        //}
                                    //}
                                ?>
                            </table>
                        </div>-->
                    </div>  
            </div>
    </body>
</html>
