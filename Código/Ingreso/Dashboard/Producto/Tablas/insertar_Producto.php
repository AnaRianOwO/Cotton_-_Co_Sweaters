<?php 
    include("../../../../DB/db.php");

    //$sql="SELECT *  FROM estado";
    //$query=mysqli_query($DB,$sql);
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
                    <h1>Agregue Producto</h1>
                    <form action="validar_producto.php" method="POST" enctype="multipart/form-data">
                        <input type="text" class="form-control mb-3" name="codigo" placeholder="Código del producto">
                        <input type="text" class="form-control mb-3" name="nameProducto" placeholder="Nombre del producto">
                        <input type="number" class="form-control mb-3" name="precio" placeholder="Precio del producto">
                        <input type="number" class="form-control mb-3" name="stock" placeholder="Stock">
                        <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion">
                        <input type="file" class="form-control mb-3" name="imagen" id="Img" required>
                        <br><br>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <a href="../../Producto/productos.php" class="btn btn-primary">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>
    </body>
</html>
