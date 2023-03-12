<?php
include '../../../DB/db.php';
session_start();
error_reporting(0);
if(isset($_SESSION['idUsuario']) and isset($_SESSION['docType'])){
    $idUsuario = $_SESSION['idUsuario'];
    $docType = $_SESSION['docType'];
    $pro = mysqli_query($DB, "SELECT F.idFactura, F.fecha, U.id_persona, U.docType, F.idEstado FROM usuario U INNER JOIN factura F ON U.id_persona=F.id_persona INNER JOIN persona P ON P.id_persona=U.id_persona WHERE P.id_persona = '$idUsuario' AND P.docType = '$docType'  ORDER BY fecha;");
}else{
    header('Location: ../../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a2ea5c7b4d.js" crossorigin="anonymous"></script>
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Facturas</title>
</head>
<body>
    <header>
        <input type="search" name="busqueda" id="busqueda" placeholder="Search...">
    </header>
    <div id="container-body">
        <div class="titulo">
            <h1>Mis Facturas</h1>
        </div>
        <div class="tabla">
            <table>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Factura</th>
                </tr>
                <?php while($data = mysqli_fetch_array($pro)){ ?>
                    <tr>
                        <td><?php echo $data['idFactura']; ?></td>
                        <td><?php echo $data['fecha']; ?></td>
                        <td data-estado="<?php echo $data['idEstado']; ?>" class="esta2">
                            <i class="fa-solid fa-ban fa-xl tooltip" data-info="0">
                                <span class="tooltip-box">
                                    <h4>Cancelado</h4>
                                    Su pedido ha sido desactivado.</span>
                            </i>

                            <i class="fa-solid fa-warehouse fa-xl tooltip" data-info="1">
                                <span class="tooltip-box">
                                    <h4>En stock</h4>
                                Su pedido se encuentra en bodega.</span>
                            </i>

                            <i class="fa-solid fa-boxes-packing fa-xl tooltip" data-info="2">
                                <span class="tooltip-box">
                                    <h4>Empacado</h4>
                                    Su pedido está listo para salir.</span>
                            </i>
                            
                            <i class="fa-solid fa-truck-moving fa-xl tooltip" data-info="3">
                                <span class="tooltip-box">
                                    <h4>En camino</h4>
                                    Su pedido está en camino.</span>
                            </i>

                            <i class="fa-solid fa-house-circle-check fa-xl tooltip" data-info="4">
                                <span class="tooltip-box">
                                    <h4>Entregado</h4>
                                    ¡Gracias por su compra!</span>
                            </i>
                        <td><center><a style="color: #fff; font-size: 20px;" class="btn btn-info" href="../../Dashboard/Factura/Info_Factura/generador_factura.php?idFactura=<?php echo $data['idFactura']?> "><i style="color: #fff; font-size: 20px;" class="fa-solid fa-file"></i></a></center></td>
                    </tr>
                <?php } ?>
                
            </table>
        </div>
        <div class="salida">
            <a href="../Usu_Per/index.php"><i class="fa-solid fa-arrow-right-to-bracket devolver"></i></a>
        </div>
        
    </div>
    <script>
        var estados = document.querySelectorAll('.esta2');
        estados.forEach(estado => {
            var esta2 = estado.getAttribute('data-estado');
            var iconos = estado.querySelectorAll('.esta2 i.tooltip');
            iconos.forEach(icono => {
                var info = icono.getAttribute('data-info');
                if(info == esta2){
                    console.log("owo");
                    icono.classList.add('activo');
                }else{
                    icono.classList.remove('activo');
                }
            });
        });
    </script>
</body>
</html>