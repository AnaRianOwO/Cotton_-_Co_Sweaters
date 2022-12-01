<?php
include('../catalogo/global/conexion.php');

session_start();

$idUsuario = $_SESSION['idUsuario'];

if(!isset($_SESSION['idUsuario'])){
    header('Location: ../../index.php');

}
$tabUsu = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM usuario WHERE idUsuario = '$idUsuario'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <link rel="stylesheet" href="style.css">
    <title>Perfil de usuario Cotton & Co Sweaters</title>
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
                <a href="../perfil.php" class="user"> <i class="fa-solid fa-user"></i> Perfil</a>
                <a href="../catalogo" class="bolso"><i class="fa-solid fa-bag-shopping "></i>  Compras</a>
                <a href="../factura/index.php" class="favorite"><i class="fa-solid fa-file"></i> Factura</a>
                <a href="direccion.php" name="cerrar" class="cerrar"><i class="fa-sharp fa-solid fa-door-closed "></i></i>  Cerrar</a>
            </div>

            <div class="container-references">
                <img src="" alt="">
            </div>
            <div class="redes-sociales">
                <a href="" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
                <a href="" class="boton-redes twitter fab fa-twitter"><i class="icon-twitter"></i></a>
                <a href="" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
            </div>
        </div>
    </section>

</body>

</html>
