<?php
include '../../../DB/db.php';
session_start();
$idUsuario = $_SESSION['idUsuario'];

$pro = mysqli_query($DB, "SELECT * FROM usuario U INNER JOIN factura F ON U.idUsuario=F.idUsuario INNER JOIN persona P ON P.id_persona=U.id_persona WHERE U.idUsuario = '$idUsuario';");

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
                    <th>Factura</th>
                </tr>
                <?php while($data = mysqli_fetch_array($pro)){ ?>
                    <tr>
                        <td><?php echo $data['idFactura']; ?></td>
                        <td><?php echo $data['fecha']; ?></td>
                        <td><center><a style="color: #fff; font-size: 20px;" class="btn btn-info" href="../../Dashboard/Factura/Info_Factura/generador_factura.php?idFactura=<?php echo $data['idFactura']?> "><i style="color: #fff; font-size: 20px;" class="fa-solid fa-file"></i></a></center></td>
                    </tr>
                <?php } ?>
                
            </table>
        </div>
        <div class="salida">
            <a href="../Usu_Per/index.php"><i class="fa-solid fa-arrow-right-to-bracket devolver"></i></a>
        </div>
        
    </div>
</body>
</html>