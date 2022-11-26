<?php
include('global/conexion.php');

session_start();

$idUsuario = $_SESSION['idUsuario'];

if(!isset($_SESSION['idUsuario'])){
    header('Location: ../../index.php');

}
$consul="SELECT * FROM usuario WHERE idUsuario = '$idUsuario'";
$consult=mysqli_query($con,$consul);

$rows=mysqli_fetch_array($consult);
include "añadir.php";
// session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a2ea5c7b4d.js" crossorigin="anonymous"></script><!-- IMPORTACION DE FONTAWESOME -->
    <link rel="stylesheet" href="CSS/carrito.css"><!-- IMPORTACION DE ESTILOS -->
    <title>Carrito de compras</title>
</head>

<body>
    <div class="cabeza">
        <h1>Bienvenido <?php echo $rows['firstName']; ?> a Cotton & Co Sweaters</h1>
        <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search">
    </div>
    <div class="container-productos">
        <?php
            if($row>0){
                while($data = mysqli_fetch_array($sql)){
                    ?>

                    <form action="" method="post">
                        <div class="carta" id="carta">
                            <input type="text" name="nameProducto" id="" value="<?php echo $data['nameProducto'] ?>">
                            <input type="text" name="codigo" id="" value="<?php echo $data['codigo'] ?>">
                            <input type="text" name="precio" id="" value="<?php echo $data['precio'] ?>">
                            <input type="number" name="cantidad" id="" value="1">
                            <br>
                            <center><img class="imagen" height="160px" src="data:image/jpg;base64, <?php echo base64_encode($data['imagen']) ?>"></center>
                            <br>
                            <input type="submit" name="btnAccion" value="Añadir">
                        </div>
                        
                    </form>
                    
                    <?php
                }
            }
        ?>


        <div class="slider-lateral">
            <i class="fa-solid fa-cart-shopping" id="carrito"></i>
            <div class="carrito-productos">
                <center><h1>Productos</h1></center>
                <table id="tabla">
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total de la compra</th>
                    </tr>
                    <?php if(!empty($_SESSION['carrito'])) { ?>
                        <div class="container-pedidos">    
                            <?php $total=0; ?>
                            <?php foreach($_SESSION['carrito'] as $indice=>$productos){ ?>
                                <div class="productos">
                                    <tr>
                                        <td><?php echo $productos['nameProducto'] ?></td>
                                        <td><?php echo $productos['cantidad'] ?></td>
                                        <td><?php echo $productos['precio'] ?></td>
                                        <td><?php echo ($productos['cantidad']*$productos['precio']); ?></td>
                                    </tr>
                                    <?php $total=$total+($productos['cantidad']*$productos['precio']); 
                                    $_SESSION['total'] = $total;
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <tr>
                            <td colspan="3"><center>Total</center></td>
                            <!-- <td><?php //echo number_format($total,2) ?></td> -->
                            <td><?php echo $total ?></td>
                        </tr>
                        <form action="" method="post">
                            <input type="submit" name="btnVaciar" value="Vaciar">
                            <input type="submit" name="btnComprar" value="Comprar">
                        </form>
                    <?php } else{
                        echo "El carrito esta vacio";
                    } ?>
                </table>
                
            </div>   
        </div>
    

    
</body>
<script src="script/carrito.js"></script>
</html>