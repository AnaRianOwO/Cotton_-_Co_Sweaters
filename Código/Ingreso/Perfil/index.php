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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Perfil de usuario Cotton & Co Sweaters</title>
    <script src="https://kit.fontawesome.com/be71717483.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">

 <!---------------------Barra izquierda botones -------------------------------->

            <div class="perfil-usuario-portada">
                <div class="container-items">
                <ul class="lista-datos">

                    <a href="perfil.php"><i class="fa-regular fa-user"></i>  Perfil</a>
                    <a href=""><i class="fa-solid fa-bag-shopping"></i>  compras</a>
                    <a href=""><i class="fa-solid fa-heart"></i>  Favoritos</a>
                    <a href=""><i class="fa-solid fa-heart"></i>  Pedidos</a>
                    <a href="logout.php"><i class="fa-regular fa-map"></i>  Cerrar</a>
                </ul>
                </div>
                
                <!--Circulo usuario-->
                <div class="perfil-usuario-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">

            <div class="perfil-usuario-bio">
   <h3 class="titulo"><?php echo $row['firstName'] ?></h3>
                <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">



                <i class="casita fa-sharp fa-solid fa-house"></i></a>  
            </ul>
        </div>

                  

                  
</section>
           

</body>

</html>