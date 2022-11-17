<?php 
    include("../conexion.php");

    $sql="SELECT *  FROM factura";
    $query=mysqli_query($con,$sql);

    $factura="SELECT * FROM factura F INNER JOIN producto P on P.codigo=F.codigo";
    $query1=mysqli_query($con,$factura);

    
    $data=mysqli_fetch_array($query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Tabla factura</title>
</head>
<body>

    <div class="form">
        <center>
            <h1>Factura</h1>
        </center>

        <form action="insertar.php" method="post">
            <h1>Producto: <?php echo $data['nameProducto'] ?></h1>
            <input type="text" name="idFactura" id="idFactura" value="" placeholder="idFactura">
            <input type="text" name="idUsuario" id="idUsuario" value="" placeholder="idUsuario">
            <input type="date" name="fecha" id="fecha" value="" placeholder="Fecha">
            <input type="text" name="codigo" id="codigo" value="" placeholder="Codigo del producto">
            <input type="text" name="cantidad" id="cantidad" value="" placeholder="cantidad">
            <input type="text" name="total" id="total" value="10000">
            <input type="text" name="obser" id="obser" value="" placeholder="Observaciones">

            <input type="submit" name="btnInsertar" id="btnInsertar" value="Insertar">
        </form>
    </div>    

    <div class="form-1">

                            <table>
                                <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Usuario</th>
                                        <th>Fecha</th>
                                        <th>Codigo</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Observaciones</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['idFactura']?></th>
                                                <th><?php  echo $row['idUsuario']?></th>
                                                <th><?php  echo $row['fecha']?></th>
                                                <th><?php  echo $row['codigo']?></th>
                                                <th><?php  echo $row['cantidad']?></th>
                                                <th><?php  echo $row['total']?></th>
                                                <th><?php  echo $row['obser']?></th>
                                                <th><a href="actualizar.php?id=<?php echo $row['idFactura'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['idFactura'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>

    </div>

</body>
</html>