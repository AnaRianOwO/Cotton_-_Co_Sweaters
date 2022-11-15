<?php

    $servidor='localhost';
    $usuario='root';
    $pass='';
    $db= 'cotton';
    $conexion=mysqli_connect($servidor,$usuario,$pass,$db)or die(msql_error());

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">    
    <title>Muestra de catalogo</title>
    <style>
        .carta{
            display: inline-block;
            width: 300px;
            height: 230px;
            background: red;
            border-radius: 10px;
            margin: 50px 30px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            color: white;
        }
        .carta .content{
            display: flex;
            position: relative;
            margin: 10px 10px;
            font-size: 20px;
        }
        .carta img{
            width: 100%;
            position: absolute;
            margin: 30px auto;
            display: flex;
            bottom: 0 !important;
        }
        
    </style>
    <header>
        <img src="#" alt="" height="200px" width="200px">
        <h1>COTTON & CO SWEATERS</h1>
        <input type="search" name="Busqueda" placeholder="Buscar" id="">
    </header>
</head>
<body>
    <h1>Datos guardados</h1>
            <?php
                $query = mysqli_query($conexion, "SELECT * FROM producto;");
                $result =mysqli_num_rows($query);
                if($result>0){
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <div class="carta">
                            <div class="content">
                                <p><?php echo $data['nameProducto'] ?><br>
                                <b style="color: green;"><?php echo $data['precio'] ?>$</b><br>
                                <?php echo $data['talla'] ?><br></p>
                            </div>
                            
                            <img class="imagen" height="120px" src="data:image/jpg;base64, <?php echo base64_encode($data['imagen']) ?>">
                        </div>
                        <?php
                    }
                }
            ?>
</body>

</html>