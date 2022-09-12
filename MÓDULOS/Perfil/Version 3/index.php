<?php
    include("conexion.php");



$id = '2314213';
$sql="SELECT * FROM usuario WHERE idUsuario='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);

$sql1 = "SELECT * FROM ciudad";
$query1=mysqli_query($con,$sql1);

$row1=mysqli_fetch_array($query1);


// $query_login = mysqli_query($con, "SELECT * FROM usuario WHERE idUsuario = '$id'");
// $clave = mysqli_query($con, "SELECT pass FROM usuario WHERE idUsuario = '$id'");
// $nr = mysqli_num_rows($query_login);
// $buscar_pass = mysqli_fetch_array($query_login);

// $contra = password_verify($clave, $buscar_pass['pass']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a2ea5c7b4d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Practica</title>
    <style>
        .container-pedido table{
            display: grid;
            grid-template-rows: 16.6% 16.6% 16.6% 16.6% 16.6% 16.6%;
            border: 2px solid #fff;
            width: 100%;
            height: 100%;
        }

        .container-pedido table th{
            border: 2px solid #fff;
            padding: 10px 55.3px;
            margin: 30px !important;
            background: #fff;
            border-radius: 5px;
        }
        .container-pedido table th i{
            margin: auto;
            font-size: 30px;
            color: red;
            cursor: pointer;
        }
    </style>
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
                </ul>
            </div>
        </div>
    



        <!-- -------------------------------------- CONTENEDOR DEL FORMULARIO ----------------------------------------------- -->

        <div class="formulario" id="formulario">
            <div class="container-form">
                <form action="update.php" method="POST" autocomplete="off">
                    <h1>Formulario personal</h1>
                    <select name="docType" id="docType" required>
                        <option value="">Seleccione su tipo de documento</option>
                        <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                        <option value="Cedula de extranjería">Cedula de extranjería</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
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
                        $query = mysqli_query($con, "SELECT * FROM ciudad;");
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
                    <button id="btn" class="btn">Validar</button>
                </form>
            </div>
        </div>



        <!-- ----------------------------------------------- CONTENEDOR DE PEDIDOS ---------------------------------------------------- -->

        <div class="container-pedido" id="container-pedido">
            
            <center><h1>Datos guardados</h1></center>
            <table>
                <tr>
                
                <?php
                    $query = mysqli_query($con, "SELECT * FROM factura;");
                    $result =mysqli_num_rows($query);
                    if($result>0){
                        while($data = mysqli_fetch_array($query)){
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
<script>
    let btnValidar = document.querySelector('.btn');

    btnValidar.addEventListener('click', (e)=>{
        console.log("Hola");
        e.preventDefault();
    });

</script>
</html>