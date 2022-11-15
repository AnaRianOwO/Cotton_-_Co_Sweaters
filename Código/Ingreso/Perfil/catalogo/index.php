<?php

    $servidor='localhost';
    $usuario='root';
    $pass='';
    $db= 'cotton';
    $conexion=mysqli_connect($servidor,$usuario,$pass,$db);//or die(msql_error());

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
        .cartas{
            width: 180vh;
            height: 100%;
            padding: 30px;
            margin: auto;
            border: 2px solid #fff;
        }
        .carta{
            display: inline-block;
            width: 280px;
            height: 420px;
            background: rgb(255, 152, 152);
            border-radius: 10px;
            margin: 50px 30px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            color: white;
        }
        .carta .card-hover{
            background: rgba(0, 0, 0, 0.949);
            position: absolute;
            width: 300px;
            height: 230px;
            cursor: default;
            /* transform: translateY(-120px); */
            justify-content: center;
            align-items: center;
            z-index: 6;
            padding:auto;
            transition: all .7s ease;
        }
        .carta .card-hover p{
            background-color: transparent;
            /* border: 2px solid #fff; */
            color: #fff;
            margin: 100px auto;
            display: flex;
            height: 30px;
            width: 100px;
            font-size: 25px;
            cursor: pointer;
        }
        .carta .content{
            display: flex;
            position: relative;
            margin: 10px 20px;
            font-size: 18px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 100;
            z-index: 3;

        }
        .carta img{
            height: 300px !important;
            position: relative;
            margin: 30px auto;
            display: flex;
            
            bottom: 0 !important;
            z-index: 3;
        }
        .apagar{
            transform: translateY(120px);
            transition: all .9s ease;
        }
    </style>
    <header>
        <img src="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png" alt="" height="200px" width="200px">
        <h1>COTTON & CO SWEATERS</h1>
        <input type="search" name="Busqueda" placeholder="Buscar..." id="busqueda" class="busqueda">
    </header>
</head>
<body>
    <center>
        <h2 class="titulo" style="font-weight: 300;font-family: Verdana;color: #025f4a; font-size: 50px;font-family: times new roman;">Catalogo</h2>
    </center>
    <div class="cartas">
        <?php
            $query = mysqli_query($conexion, "SELECT * FROM producto;");
            $result =mysqli_num_rows($query);
            if($result>0){
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <div class="carta" id="carta">
                        <!-- <div class="card-hover">
                            <p>Leer mas</p>
                        </div> -->
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
    </div>
            
</body>
<script>

    const carta = document.querySelector('.carta');
    const busca = document.querySelector('.busqueda');
    busca.addEventListener('blur',()=>{
        buscar = busca.value;
        if(carta.classList == buscar){
            let hidden = carta.classList == buscar;
            hidden.classList.add('apagar');
        }else{
            console.log('La clase no es carta');
        }
    });
    

</script>
</html>