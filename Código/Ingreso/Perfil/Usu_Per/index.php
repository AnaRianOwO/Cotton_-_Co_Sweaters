<?php
require_once ("../../../DB/db.php");

session_start();

$idUsuario = $_SESSION['idUsuario'];
$docType = $_SESSION['docType'];

if(!isset($_SESSION['idUsuario'])){
    header('Location: ../../index.php');

}

$tabUsu = mysqli_fetch_array(mysqli_query($DB, "SELECT * FROM persona WHERE id_persona = '$idUsuario' and docType = '$docType'"));

$perfil = mysqli_query($DB,"SELECT * FROM factura F INNER JOIN usuario U ON F.idUsuario=U.idUsuario INNER JOIN persona P ON U.id_persona=P.id_persona WHERE P.id_persona = '$idUsuario' AND P.docType = '$docType'");
$datos = mysqli_fetch_array($perfil);

$ciudadPersona = mysqli_query($DB,"SELECT * FROM persona P INNER JOIN ciudad C ON C.idCiudad=P.idCiudad WHERE P.id_persona= '$idUsuario' AND P.docType = '$docType'");
$ciu = mysqli_fetch_array($ciudadPersona);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Perfil de usuario Cotton & Co Sweaters</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <script src="https://kit.fontawesome.com/be71717483.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                <i class="fa-regular fa-user" ></i>
                    </button>
                </div>

            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $tabUsu['firstName']," ", $tabUsu['surname']; ?></h3>
            </div>
            <div class="perfil-usuario-footer">
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="user"> <i class="fa-solid fa-user"></i> Perfil</a>
                <!-- <a href="../perfil.php" class="user"> <i class="fa-solid fa-user"></i> Perfil</a> -->
                <a href="../catalogo" class="bolso"><i class="fa-solid fa-bag-shopping "></i>  Compras</a>
                <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="favorite"><i class="fa-solid fa-file"></i> Factura</a> -->
                <a href="../factura/index.php" class="favorite"><i class="fa-solid fa-file"></i> Factura</a>
                <a href="direccion.php" name="cerrar" class="cerrar"><i class="fa-sharp fa-solid fa-door-closed "></i></i>  Cerrar</a>
            </div>
            <div class="redes-sociales">
                <a href="" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
                <a href="" class="boton-redes twitter fab fa-twitter"><i class="icon-twitter"></i></a>
                <a href="" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
            </div>
        </div>
    </section>
    
    
    <!-- MODAL FACTURA -->
    
    <div class="Ventana-modal">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Perfil y actualizacion de datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="update.php" method="post">
                        <div class="modal-body" style="overflow-y: auto !important;">
                                <h5>Nombres</h5>
                                <div>
                                    <input type="text" name="firstName" placeholder="Primer nombre" value="<?php echo $datos['firstName'] ?>" style="border: none; border-bottom: 2px solid black;">
                                    <input type="text" name="secondName" placeholder="Segundo nombre" value="<?php echo $datos['secondName'] ?>" style="border: none; border-bottom: 2px solid black;">
                                </div>
                                <h5>apellido</h5>
                                <div>
                                    <input type="text" name="surname" placeholder="Primer apellido" value="<?php echo $datos['surname']?>" style="border: none; border-bottom: 2px solid black;">
                                    <input type="text" name="secondSurname" placeholder="Segundo apellido" value="<?php echo $datos['secondSurname']?>" style="border: none; border-bottom: 2px solid black;">
                                </div>
                                <h5>Correo</h5>
                                <input type="text" name="correo" placeholder="Correo" value="<?php echo $datos['correo'] ?>" style="border: none; border-bottom: 2px solid black;">
                                <h5>Contacto</h5>
                                <div>
                                    <input type="" name="indicativo" placeholder="Indicativo" value="<?php echo $datos['indicativo'] ?>" style="width: 40px;border: none; border-bottom: 2px solid black;">
                                    <input type="" name="phone" placeholder="Numero" value="<?php echo $datos['phone'] ?>" style="border: none; border-bottom: 2px solid black;">
                                </div>
                                <h5>Dirección</h5>
                                <input type="" name="direccion" placeholder="Dirección" value="<?php echo $datos['direccion'] ?>" style="border: none; border-bottom: 2px solid black;">
                                <h5>Ciudad</h5>
                                <select name="ciudad" id="">
                                    <?php $consult = mysqli_query($DB,"SELECT * FROM ciudad;"); ?>
                                    <option value="<?php echo $ciu['idCiudad']; ?>"><?php echo $ciu['nameCiudad']; ?></option>
                                    <?php while($ciudades= mysqli_fetch_array($consult)){ ?>
                                        <option value="<?php echo $ciudades['idCiudad'];?>"><?php echo $ciudades['nameCiudad'];?></option>
                                    <?php } ?>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="btnActivar" value="Actualizar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function modo(){
        const body = document.querySelector('body');
        body.classList.toggle('dark');
    }
</script>
</html>
