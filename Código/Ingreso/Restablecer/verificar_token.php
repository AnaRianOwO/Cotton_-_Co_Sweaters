<?php
    error_reporting(0);
    include "../../DB/db.php";
    $correo = $_POST['correo'];
    $token = $_POST['token'];
    $codigo = $_POST['codigo'];

    $res = $DB->query("SELECT * FROM passwords where correo = '$correo' and token = '$token' and codigo = '$codigo'") or die($DB->error);

    $correcto = false;
    if(mysqli_num_rows($res) > 0){
        $fila = mysqli_fetch_row($res);
        $fecha = $fila[4];
        $fecha_actual = date("Y-m-d h:m:s");
        $seconds = strtotime($fecha_actual) - strtotime($fecha);
        $minutos = $seconds / 60;
        /*
        if($minutos > 1){
            echo "Token vencido";
        }else{
            echo "Todo correcto";
        }*/

        $correcto = true;
    }else{
        $correcto = false;
    }
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                setTimeout(function() {
                    $(".content").fadeOut(1000);
                },2000);
            
                setTimeout(function() {
                    $(".content2").fadeIn(1000);
                },4000);
            });
        </script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            <?php if($correcto){ ?>
            <form class="col-3" action="update_password.php" method="POST">
                <h2>Restablecer Password</h2>
                <div class="mb-3">
                    <label for="c" class="form-label">Nueva contraseña</label>
                    <input type="password" class="form-control" id="c" name="p1" required>
                </div>

                <div class="mb-3">
                    <label for="c" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="c" name="p2" required>
                    <input type="hidden" class="form-control" id="c" name="correo" value="<?php echo $correo?>">
                </div>
               
                <button type="submit" class="btn btn-primary">Restablecer</button>
            </form>
            <?php }else{ ?>
                <div class="alert alert-danger">Código incorrecto o vencido</div>
                <?php } ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>