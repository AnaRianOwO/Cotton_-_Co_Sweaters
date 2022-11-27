<?php 

include("../../../../DB/db.php");

$codigo=$_GET['codigo'];
$sql="SELECT P.codigo, P.nameProducto, P.precio, P.stock, P.descripcion, E.nameEstado 
FROM producto P INNER JOIN estado E ON P.idEstado=E.idEstado WHERE P.codigo='$codigo'";
$query=mysqli_query($DB,$sql);
$row=mysqli_fetch_assoc($query);

$sqlEstado = "SELECT * FROM estado";
$resultadoEstado = mysqli_query($DB,$sqlEstado);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST" enctype="multipart/form-data">
                    
                                <h3 class="text-center">Editar Producto</h3>
                                <input type="hidden" name="codigo" value="<?php echo $row['codigo']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="nameProducto" placeholder="Nombre del producto" value="<?php echo $row['nameProducto']  ?>">
                                <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" value="<?php echo $row['precio']  ?>">
                                <input type="text" class="form-control mb-3" name="stock" placeholder="stock" value="<?php echo $row['stock']  ?>">
                                <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion']  ?>">
                                <!--<input type="file" class="form-control mb-3" name="imagen" placeholder="Imagen" value="<?php //echo $row['imagen'] ?>">-->
                                <select name="idEstado"  required>
                                    <option value="">Seleccione su ciudad</option>
                                    <?php while($select = $resultadoEstado->fetch_assoc())
                                            {
                                                $select['idEstado'] = "'".$select['idEstado']."'";
                                                echo "<option value=".$select['idEstado']; if ($select['nameEstado']==$row['nameEstado']){ echo "selected"; };
                                                echo ">".$select['nameEstado']."</option>";
                                            }
                                    ?>
                                </select>
                                <br><br>
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="idAdministrador" value="<?php echo $row;?>">

                                <button type="submit" class="btn btn-success" >Editar</button>
                                <a href="../productos.php" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
    </body>
</html>