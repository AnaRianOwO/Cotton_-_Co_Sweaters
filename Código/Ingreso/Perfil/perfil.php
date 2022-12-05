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
    <link rel="stylesheet" href="style_perfil.css" type="text/css">
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
                    <!-- <li id="perfil"><a href="index.php">INICIO</a></li> -->
                    <li id="perfil"><a href="Usu_Per/index.php">REGRESAR</a></li>
                </ul>
            </div>
        </div>
    



        <!-- -------------------------------------- CONTENEDOR DEL FORMULARIO ----------------------------------------------- -->

        <div class="formulario" id="formulario">
            <div class="container-form">
                <form action="update.php" method="POST" autocomplete="off">
                    <h1>Formulario personal</h1>
                    <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName'] ?>" placeholder="Primer nombre" required oninvalid="this.setCustomValidity(' Por favor introduce tu primer nombre')">
                    <input type="text" id="secondName" name="secondName" value="<?php echo $row['secondName'] ?>" placeholder="Segundo nombre">
                    <input type="text" id="surname" name="surname" value="<?php echo $row['surname'] ?>" placeholder="Primer apellido" required oninvalid="this.setCustomValidity(' Por favor introduce tu primer apellido')">
                    <input type="text" id="secondSurname" name="secondSurname" value="<?php echo $row['secondSurname'] ?>" placeholder="Segundo apellido">
                    <input type="text" id="indicativo" name="indicativo" placeholder="Indicativo del pais" value="<?php echo $row['indicativo'] ?>" required oninvalid="this.setCustomValidity(' Por favor introduce el indicativo de tu teléfono')">
                    <input type="text" name="phone" id="phone" class="phone" placeholder="Télefono" value="<?php echo $row['phone'] ?>" required oninvalid="this.setCustomValidity(' Por favor introduce tu número de teléfono')">
                    <input type="email" name="correo" id="correo" class="" value="<?php echo $row['correo'] ?>" required oninvalid="this.setCustomValidity(' Por favor introduce tu dirección de correo electrónico')">
                    <input type="text" name="direccion" id="direccion" class="direccion" value="<?php echo $row['direccion'] ?>" required oninvalid="this.setCustomValidity(' Por favor introduce tu dirección de residencia')">
                    <select name="idCiudad" id="idCiudad" required oninvalid="this.setCustomValidity(' Por favor introduce tu ciudad')">
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


</body>
<script src="script.js"></script>

</html>