<?php 
include('DB/db.php');

$vendidos="SELECT P.codigo, P.nameProducto, P.descripcion, P.precio, P.imagen, SUM(D.cantidad) FROM producto P INNER JOIN detallefactura D ON P.codigo = D.codigo WHERE P.idEstado = 1 GROUP BY P.codigo ORDER BY SUM(D.cantidad) DESC LIMIT 3";
$vendidosql=mysqli_query($DB,$vendidos);
$vendidosrow = mysqli_num_rows($vendidosql);

$ofertas="SELECT P.codigo, P.nameProducto, P.descripcion, P.precio, P.imagen FROM producto P WHERE P.idEstado = 1 ORDER BY P.precio ASC LIMIT 3";
$ofertasql=mysqli_query($DB,$ofertas);
$ofertasrow = mysqli_num_rows($ofertasql);

$ultimos="SELECT P.codigo, P.nameProducto, P.descripcion, P.precio, P.imagen, F.fecha FROM producto P INNER JOIN detallefactura D ON P.codigo = D.codigo INNER JOIN factura F ON D.idFactura = F.idFactura WHERE P.idEstado = 1 GROUP BY P.codigo ORDER BY F.fecha ASC LIMIT 3";
$ultimosql=mysqli_query($DB,$ultimos);
$ultimosrow = mysqli_num_rows($ultimosql);

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/be71717483.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
 <title>Cotton & Co Sweaters</title>
 <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
</head>

<body>


    <header>
        <div class="container-header">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap');
                </style>
            <h1>Cotton & Co Sweaters</h1>
            <hr class="line-header">
            <div class="icon">
                <p class="icon-header"><a href="Ingreso/index.php"><i class="fa-regular fa-circle-user"></i></p></a></a>
                <p class="icon-header"><a href="../Código/catalogo/index.php"><i class="fa-solid fa-bag-shopping"></i></p></a></a>
            </div>
        </div>

        <nav>
            <ul class="Menu">
                <li><a href="catalogo/index.php">Catálogo</a></li>
                <li><a href="#ubicacion">Contactanos</a></li>

            </ul>
        </nav>

    </header>
    <div class="container-all">

        <input type="radio" name="image-slide" id="1" hidden>
        <input type="radio" name="image-slide" id="2" hidden>
        <input type="radio" name="image-slide" id="3" hidden>
        <input type="radio" name="image-slide" id="4" hidden>


        <div class="slide">
            <div class="item-slide">
                <img src="IMG/Slider/5.jpg">
            </div>

            <div class="item-slide">
                <img src="IMG/Slider/6.jpg">
            </div>

            <div class="item-slide">
                <img src="IMG/Slider/7.jpg">
            </div>

            <div class="item-slide">
                <img src="IMG/Slider/8.jpg">
            </div>

        </div>

        

        <div class="pagination">

            <label class="pagination-item" for="1">
                <img src="IMG/Slider/1.jpg" alt="">
            </label>

            <label class="pagination-item" for="2">
                <img src="IMG/Slider/2.jpg" alt="">
            </label>

            <label class="pagination-item" for="3">
                <img src="IMG/Slider/3.jpg" alt="">
            </label>

            <label class="pagination-item" for="4">
                <img src="IMG/Slider/4.jpg" alt="">
            </label>

        </div>
    </div>
    
    
        <main>
            <div class="destacados">
                <h1 class="article"><b>DESTACADOS</b></h1>
                <hr class="linea">
                <div class="container-card">
                <?php
                    if($vendidosrow>0){
                        while($vendidosrow = mysqli_fetch_array($vendidosql)){
                        ?>
                            <div class="card">
                                <img class="imagen" id="imagen" src="data:image/jpg;base64, <?php echo base64_encode($vendidosrow['imagen']) ?>">
                                <div class="content_1">
                                    <h2><?php echo $vendidosrow['nameProducto']; ?></h2>
                                    <p><?php echo $vendidosrow['descripcion']; ?></p>
                                    <p><?php echo "$",$vendidosrow['precio']; ?></p>
                                    <a href="catalogo/#<?php echo $ofertasrow['codigo']?>">Ver detalles</a>
                                </div>
                            </div>
                                
                            <?php    
                            }
                            } ?>
                </div>
            </div>

            <div class="destacados">
                <h1 class="article"><b>OFERTAS</b></h1>
                <hr class="linea">
                <div class="container-card">
 
                <?php
                    if($ofertasrow>0){
                        while($ofertasrow = mysqli_fetch_array($ofertasql)){
                        ?>
                            <div class="card">
                                <img class="imagen" id="imagen" src="data:image/jpg;base64, <?php echo base64_encode($ofertasrow['imagen']) ?>">
                                <div class="content_1">
                                    <h2><?php echo $ofertasrow['nameProducto']; ?></h2>
                                    <p><?php echo $ofertasrow['descripcion']; ?></p>
                                    <p><?php echo "$",$ofertasrow['precio']; ?></p>
                                    <a href="catalogo/#<?php echo $ofertasrow['codigo']?>">Ver detalles</a>
                                </div>
                            </div>
                                
                        <?php    
                        }
                        } ?>
                </div>
            </div>
            <div class="destacados">
                <h1 class="article"><b>NOVEDAD</b></h1>
                <hr class="linea">
                <div class="container-card">
 
                <?php
                if($ultimosrow>0){
                    while($ultimosrow = mysqli_fetch_array($ultimosql)){
                    ?>
                        <div class="card">
                            <img class="imagen" id="imagen" src="data:image/jpg;base64, <?php echo base64_encode($ultimosrow['imagen']) ?>">
                            <div class="content_1">
                                <h2><?php echo $ultimosrow['nameProducto']; ?></h2>
                                <p><?php echo $ultimosrow['descripcion']; ?></p>
                                <p><?php echo "$",$ultimosrow['precio']; ?></p>
                                <a href="catalogo/#<?php echo $ofertasrow['codigo']?>">Ver detalles</a>
                            </div>
                        </div>
                                
                    <?php    
                    }
                    } ?>
                </div>
            </div>
        </main>
        
        <div class="container-contact">
               
   
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
                        <span class="menu-title">Menu</span>
                        <a href="" class="menu-item-footer">Home</a>
                        <a href="catalogo/index.php" class="menu-item-footer">Carrito de compras</a>
                        <a href="Ingreso/Perfil/Usu_Per/index.php" class="menu-item-footer">Mis facturas</a>
                        <a href="../Código/Manual de usuario (Cliente) - Cotton & Co Sweaters.pdf" class="menu-item-footer">Ayuda</a>
                    </div>
                    <div class="footer-content-container">
                        <span class="menu-title">Contactanos</span>
                        <a href="https://mail.google.com/mail/u/1/#inbox?compose=CrpPbDzChjfwHkTDtmnMSbSDDFqwtpxKpTMmtdlGQLtWGDLJKJBTBdLdJjsLthXfhZhvqpVjvGsVGVfPflTg" class="menu-item-footer"> <i class="fa-regular fa-envelope"></i> Correo</a>
                        <a href="https://www.google.com/maps/place/Cotton+%26+Co+Sweaters/@4.586636,-74.086903,16z/data=!4m6!3m5!1s0x8e3f99807d7356fb:0x450bfec92392e30!8m2!3d4.5866355!4d-74.0869031!16s%2Fg%2F11mv1nd2j1?hl=es" class="menu-item-footer"> <i class="fa-solid fa-location-dot"></i> </i>Ubicación </a>
                        <a href="#" class="menu-item-footer"><i class="fa-solid fa-phone"></i> </i>3502120698 </a>
                    </div>
                </div>
                <div class="footer-content-container">
                        <span class="menu-title">legal</span>
                        <a href="Ingreso/Perfil/Usu_Per/index.php" class="menu-item-footer">Mi perfil</a>
                        <a href="Ingreso/terminosYCondiciones.html" class="menu-item-footer">Termino y condiciones </a>
                        <a href="catalogo/index.php" class="menu-item-footer">Catálogo</a>
                    </div>
                </div>
                
                <div class="footer-content-container">
                    <span class="menu-title">Siguenos</span>
                    <div class="social-container">
                        <a href="https://www.civico.com/lugar/cotton-and-co-sweaters-bogota/" class="social-link"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.facebook.com/people/Cotton-CoSweaters/100051324772323/" class="social-link"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/cottonyco_/?hl=es" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://github.com/AnaRianOwO/Cotton_-_Co_Sweaters" class="social-link"><i class="fa-brands fa-github"></i></a>   
                    </div>
                </div>
            </div>
            </div> 
    </div>
            <div class="copyright-container">
                <span class="copyright">Copyright 2023, Cotton&CoSweaters.com. All rights reserved.</span>
            </div>
        </footer>
</body>

<script src="JS/script.js"></script>


</html>