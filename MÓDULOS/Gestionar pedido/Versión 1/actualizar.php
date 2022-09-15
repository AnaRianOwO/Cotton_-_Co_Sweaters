<?php 
    include("../conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM factura WHERE idFactura='$id'";
$query=mysqli_query($con,$sql);
$usuario="SELECT * FROM factura F INNER JOIN usuario U on F.idUsuario=U.idUsuario";
$query=mysqli_query($con,$usuario);



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
                    <form action="update.php" method="POST">

                                <h1>Factura correspontiente al usuario: <?php echo $row['firstName']; echo $row['surname'] ?></h1>
                    
                                <input type="hidden" name="idFactura" value="<?php echo $row['idFactura']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="firstName" placeholder="Primer nombre" value="<?php echo $row['firstName']  ?>">
                                <input type="text" class="form-control mb-3" name="idUsuario" placeholder="Numero de usuario" value="<?php echo $row['idUsuario']  ?>">
                                <input type="text" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha']  ?>">
                                <input type="text" class="form-control mb-3" name="codigo" placeholder="Codigo del producto" value="<?php echo $row['codigo']  ?>">
                                <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad de productos" value="<?php echo $row['cantidad']  ?>">
                                <input type="text" class="form-control mb-3" name="total" placeholder="Total de precio" value="<?php echo $row['total']  ?>">
                                <input type="text" class="form-control mb-3" name="obser" placeholder="Observaciones" value="<?php echo $row['obser']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>