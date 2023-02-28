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

    

                <form action="registrar.php" method="POST" class="form" id="registro">
                    <!-- ponerle un div a cada campo, por fa ana del futuro x'd -->
                    <center><h2>Registro</h2></center>
                    <div class="content-select" id="selectDOCTYPE">
                        <select name="docType" id="docType" class="content-select" oninvalid="this.setCustomValidity(' Por favor selecciona tu tipo de documento')">
                            <option value="">Seleccione tipo de documento</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="PP">Pasaporte</option>
                            <option value="CE">Cédula de extranjería</option>
                        </select>
                        <i></i>
                    </div>  
                    
                    <div class="grupo-validar" id="grupo-idUsuario">
                        <input type="number" class="" name="idUsuario" placeholder="Número de documento" oninvalid="this.setCustomValidity(' Por favor introduce tu número de documento')">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El número de documento no puede tener letras o símbolos (8-15).</p>
                    </div>
                    
                    <div class="nombre-completo">
                        <div class="grupo-validar" id="grupo-Name">
                            <input type="text" class="" name="Name" placeholder="Nombre" oninvalid="this.setCustomValidity(' Por favor introduce tu nombre')">
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El nombre no puede contener símbolos o números (1-20).</p>
                        </div>

                        <div class="grupo-validar" id="grupo-secondName">
                            <input type="text" class="" name="secondName" placeholder="Segundo nombre">
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El nombre no puede contener símbolos o números (1-20).</p>
                        </div>

                        <div class="grupo-validar" id="grupo-surname">
                            <input type="text" class="" name="surname" placeholder="Apellido" oninvalid="this.setCustomValidity(' Por favor introduce tu apellido')" >
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El apellido no puede contener símbolos o números (1-20).</p>
                        </div>

                        <div class="grupo-validar" id="grupo-secondSurname">
                            <input type="text" class="" name="secondSurname" placeholder="Segundo apellido">
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El apellido no puede contener símbolos o números (1-20).</p>
                        </div>
                    </div>
               
                    <div class="content-select">
                        <select name="idCiudad" id="idCiudad" class="content-select">
                            <option value="">Seleccione su ciudad</option>
                                <?php while($row = $resultadoCiudad->fetch_assoc())
                                    {
                                        echo "<option value=".$row['idCiudad'].">".$row['nameCiudad']."</option>";
                                    }
                                ?>
                        </select>
                        <i></i>
                    </div>

                    <div class="grupo-validar" id="grupo-indicativo">
                        <input type="text" class="" name="indicativo" placeholder="Indicativo del celular">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El indicativo debe contener un símbolo "+" y un número.</p>
                    </div>

                    <div class="grupo-validar" id="grupo-phone">
                        <input type="number" class="" name="phone" placeholder="Celular">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El celular no puede contener letras o símbolos. (10-15)</p>
                    </div>

                    <div class="grupo-validar" id="grupo-direccion">
                        <input type="text" class="" name="direccion" placeholder="Dirrección">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">Introduzca correctamente su dirección.</p>
                    </div>

                    <div class="grupo-validar" id="grupo-correo">
                        <input type="email" id="correo" name="correo" placeholder="Correo electrónico">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El correo debe tener nombre de usuarios, símbolo de @, organización (gmail, hotmail, etc.) y tipo (.com, .edu, .org, etc.).</p>
                    </div>

                    <div class="grupo-validar" id="grupo-pass">
                        <input type="password" id="Pass" name="pass" placeholder="Contraseña">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">La contraseña debe tener al menos 8 carácteres y menos de 12.</p>
                    </div>

                    <div class="grupo-validar last" id="grupo-pass2">
                        <input type="password" id="Pass2" name="pass2" placeholder="Confirmar contraseña">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">Las contraseñas deben coincidir.</p>
                    </div>
                    
                    <input type="checkbox" name="checkbox" id="checkbox" class="checkbox" required><center>Acepta los <a href="#" class="TyC" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>términos y condiciones</a> antes de terminar</center>
                    <p><center><a href="../Ingreso/index.php">¿Ya tienes cuenta?</a></center></p>
                    

                    <center><input type="submit" class="TyC btn btn-primary" name="btn_registrar" id="btn_registrar" value="Registrar" disabled></center>
                </form>
                <div class="tapa" id="tapa">
                    <h1>Cotton & Co Sweaters</h1>
                </div>


            <!-- Modal -->
            
            
            <div class="banner_img">
                <img src="ropa.png" alt="">
            </div>

            <?php include_once "template/terminos_y_condiciones.php"; ?>

            <?php include_once "template/burbujas.php"; ?>
            
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

<script src="funciones.js"></script>
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