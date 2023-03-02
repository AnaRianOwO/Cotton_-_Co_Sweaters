<html>

</html>
<?php

include("../DB/db.php");
$sqlCiudad = "SELECT * FROM ciudad ORDER BY nameCiudad ASC";
$resultadoCiudad = mysqli_query($DB, $sqlCiudad);

include "registrar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/be71717483.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <title>Registro</title>
</head>
<body>

    
            <div class="f_contenedor">
                <?php include_once "template/formulario.php" ?>
                <div class="tapa" id="tapa">
                    <h1>Cotton & Co Sweaters</h1>
                </div>
            </div>

            <!-- Modal -->
            
            
            <!-- <div class="banner_img">
                <img src="ropa.png" alt="">
            </div> -->

            <?php include_once "template/terminos_y_condiciones.php"; ?>

            <?php include_once "template/burbujas.php"; ?>
            
</body>
<script src="funciones.js"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
    let btn = document.getElementById('btn_registrar');

    btn.addEventListener('click', function(e){
        let pass = document.getElementById('Pass').value;
        let correo = document.getElementById('correo').value;
        if(pass.length < 8){
            Swal.fire({
                title: 'Caracteres insuficientes',
                text: 'La contraseña debe tener por lo menos 8 caracteres o mas',
                icon: 'warning',
                confirmButtonText: 'Quiero arreglarlo',
            })
            .then(resultado => {
                if (resultado.value) {
                    
                }
            });
            e.preventDefault();
        }
    });
</script>

</html>