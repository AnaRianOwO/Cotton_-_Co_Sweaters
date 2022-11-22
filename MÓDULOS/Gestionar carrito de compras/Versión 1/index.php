<?php SESSION_START();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/net/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.css">
    <script src="https://cdn.jsdelivr.net/net/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../Alert/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="../Alert/sweetalert-dev.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <link rel="stylesheet" href="../css/style_cp.css">
    <title>Carrito de compras</title>
</head>

<?php
include('nav-carrito.php');
?>
<body>
    <div class="center mt-5">
        <div class="card pt-3">
            <p style="font-weight: bold; color: #0F68B7; font-size: 22px;">Carrito</p>
            <div class="container-fluid p-2" style="background: ghostwhite;">

            <?php
                $sql=mysqli_query($con, "SELECT * FROM producto");
                $filas = mysqli_num_rows($sql);
            ?>

            <h5 class="card-tittle">resultados(<?php echo $filas; ?>)</h5>
            <div class="cotainer_card">

                <form action="añadir.php" method="post">
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM producto;");
                        $result =mysqli_num_rows($query);
                        if($result>0){
                            while($data = mysqli_fetch_array($query)){
                                ?>
                                <div class="carta" id="carta">
                                    <!-- <div class="card-hover">
                                        <p>Leer mas</p>
                                    </div> -->
                                    <div class="content">
                                        <input type="hidden" name="cantidad" value="1">
                                        <input type="hidden" name="titulo" value="<?php echo $data['nameProducto']; ?>">
                                        <input type="hidden" name="precio" value="<?php echo $data['precio']; ?>">
                                        <p><?php echo $data['nameProducto'] ?><br>
                                        <b style="color: green;"><?php echo $data['precio'] ?>$</b><br>
                                        <?php echo $data['talla'] ?><br></p>
                                    </div>
                                        
                                    <img class="imagen" height="120px" src="data:image/jpg;base64, <?php echo base64_encode($data['imagen']) ?>">
                                    <input type="submit" value="Añadir">
                                </div>
                                <?php
                            }  
                        }
                    ?>
                </form>
            </div>

            </div>
        </div>
    </div>
    <?php
        include('modal-car.php');
    ?>
</body>
</html>