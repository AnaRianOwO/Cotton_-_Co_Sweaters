<?php 

    include("../../../DB/db.php");


$id=$_GET['id'];

$sql="SELECT * FROM producto WHERE codigo='$id'";
$query=mysqli_query($DB,$sql);

$row=mysqli_fetch_array($query);
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
                    
                                <input type="hidden" name="codigo" value="<?php echo $row['codigo']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="nameProducto" placeholder="Nombre del producto" value="<?php echo $row['nameProducto']  ?>">
                                <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" value="<?php echo $row['precio']  ?>">
                                <input type="text" class="form-control mb-3" name="stock" placeholder="stock" value="<?php echo $row['stock']  ?>">
                                <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion']  ?>">
                                <input type="file" class="form-control mb-3" name="imagen" placeholder="Imagen" value="<?php //echo $row['imagen'] ?>">
                                <input type="text" class="form-control mb-3" name="idEstado" placeholder="Estado" value="<?php echo $row['idEstado'] ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>