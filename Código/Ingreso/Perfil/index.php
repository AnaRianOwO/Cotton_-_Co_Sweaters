<?php
    include("../../DB/db.php");
    session_start();

    $idUsuario = $_SESSION['idUsuario'];

    if(!isset($_SESSION['idUsuario'])){
        header('Location: ../index.php');    

    }
    $sql="SELECT * FROM usuario WHERE idUsuario = '$idUsuario'";
    $query=mysqli_query($DB,$sql);

    $row=mysqli_fetch_array($query);

    $sql1 = "SELECT * FROM ciudad";
    $query1=mysqli_query($DB,$sql1);

    $row1=mysqli_fetch_array($query1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a2ea5c7b4d.js" crossorigin="anonymous"></script>
    <link rel="icon" href="IMG/logo.png">
    <title>Perfil</title>
</head>

<body>
    <header>

    </header>
    


    

    <div class="container-body"><!-- INICIO DE CONTENEDOR DEL BODY -->



        <!-- ---------------------------------------- CONTENEDOR DE VENTANA MODAL -------------------------------------------- -->

        <div class="ventana-modal apagar">
            <div class="ventana">
                <h1>¿Enserio quieres cambiar tus datos?</h1>
                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                <button id="btn_no">No, si soy David</button>
            </div>
        </div>



        <!-- ------------------------------------ CONTENEDOR DE CATEGORIAS ------------------------------------------- -->

        <div class="categorias">
            <div class="container-categoria">
                <ul>
                    <li id="perfil"><a href="#">Perfil</a></li>
                    <li id="pedidos"><a href="#">Pedidos</a></li>
                    <li id="favoritos"><a href="#">Favoritos</a></li>
                    <li id="catalogo"><a href="catalogo/index.php">Catalogo</a></li>
                    <li id="catalogo"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    



        <!-- -------------------------------------- CONTENEDOR DEL FORMULARIO ----------------------------------------------- -->

        <div class="formulario" id="formulario">
            <div class="container-form">
                <form action="update.php" method="POST" autocomplete="off">
                    <h1>Formulario personal</h1>
                    <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName'] ?>" placeholder="Primer nombre">
                    <input type="text" id="secondName" name="secondName" value="<?php echo $row['secondName'] ?>" placeholder="Segundo nombre" >
                    <input type="text" id="surname" name="surname" value="<?php echo $row['surname'] ?>" placeholder="Primer apellido" >
                    <input type="text" id="secondSurname" name="secondSurname" value="<?php echo $row['secondSurname'] ?>" placeholder="Segundo apellido" >
                    <input type="text" id="indicativo" name="indicativo" placeholder="Indicativo del pais" value="<?php echo $row['indicativo'] ?>" >
                    <input type="text" name="phone" id="phone" class="phone" value="<?php echo $row['phone'] ?>" >
                    <input type="email" name="correo" id="correo" class="" value="<?php echo $row['correo'] ?>" >
                    <input type="text" name="direccion" id="direccion" class="direccion" value="<?php echo $row['direccion'] ?>" >
                    <select name="idCiudad" id="idCiudad" required>
                        <?php
                        $query = mysqli_query($DB, "SELECT * FROM ciudad;");
                        $result =mysqli_num_rows($query);
                        if($result>0){
                            while($data = mysqli_fetch_array($query)){
                        ?>
                                <option value="<?php echo $data['idCiudad'] ?>" <?php if($data['idCiudad']==$row['idCiudad']){echo "selected";} ?>><?php echo $data['nameCiudad'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                   <center><button id="btn" class="btn">Validar</button></center> 
                </form>
            </div>
        </div>



        <!-- ----------------------------------------------- CONTENEDOR DE PEDIDOS ---------------------------------------------------- -->

        <div class="container-pedido" id="container-pedido">
            <center><h1>Datos guardados</h1></center>
            <table>
                <tr>   
                    <?php
                        $query_pedido = mysqli_query($DB, "SELECT * FROM factura");
                        $result = mysqli_num_rows($query_pedido);
                        if($result>0){
                            while($data = mysqli_fetch_array($query_pedido)){
                                ?>
                                    <th><?php echo $data['idUsuario']; ?></th>
                                    <th><?php echo $data['fecha']; ?></th>
                                    <th><?php echo $data['codigo']; ?></th>
                                    <th><?php echo $data['cantidad']; ?></th>
                                    <th><?php echo $data['total']; ?></th>
                                    <th><?php echo $data['obser']; ?></th>
                                    <th><i class="fa-sharp fa-solid fa-eye"></i></th>
                                <?php
                            }
                        }
                    ?>
                </tr>
            </table>
        </div>


        <!-- ------------------------------------------ CONTENEDOR DE FAVORITOS ----------------------------------------------- -->

        <div class="container-favorito" id="container-favorito">
            <center>
                <h1>Favoritos</h1>
            </center>
        </div>


    </div> <!-- FIN DE CONTENEDOR DE BODY -->


<!--FOOTER-->
    <footer>
        <div class="footer-container">
            <div class="footer-content-container">
                <h3 class="website-logo">COTTON & CO SWEATERS</h3>
                <span class="footer-info">Keep it soft. Keep it simple. Keep it Cotton.</span>
                <span class="footer-info">cottoncosweattt@gmail.com</span>
            </div>
            <div class="footer-menus">
                <div class="footer-content-container">
                    <span class="menu-title">menu</span>
                    <a href="" class="menu-item-footer">Home</a>
                    <a href="" class="menu-item-footer">Carrito de compras</a>
                    <a href="" class="menu-item-footer">Favoritos</a>
                </div>
                <div class="footer-content-container">
                    <span class="menu-title">legal</span>
                    <a href="" class="menu-item-footer">Mi perfil</a>
                    <a href="" class="menu-item-footer">Termino y condiciones </a>
                    <a href="" class="menu-item-footer">Catálogo</a>
                </div>
            </div>
            
            <div class="footer-content-container">
                <span class="menu-title">Siguenos</span>
                <div class="social-container">
                    <i class="fa-brands fa-twitter"><a href="" class="social-link"></a></i>
                    <i class="fa-brands fa-facebook"><a href="" class="social-link"></a></i>
                    <i class="fa-brands fa-instagram"><a href="" class="social-link"></a></i>
                    <i class="fa-brands fa-linkedin"><a href="" class="social-link"></a></i>   
                </div>
            </div>
        </div>
        <div class="copyright-container">
            <span class="copyright">Copyright 2022, Cotton&CoSweaters.com. All rights reserved.</span>
        </div>
    </footer>

</body>
<script src="script.js"></script>

</html>