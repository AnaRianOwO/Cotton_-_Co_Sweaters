<?php
error_reporting(0);
if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']) {
        case 'Añadir':
            $nombrePro = $_POST['nameProducto'];
            $codigo = $_POST['codigo'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];


            if(!isset($_SESSION['carrito'])){
                $productos = array(
                    'nameProducto'=>$nombrePro,
                    'codigo'=>$codigo,
                    'cantidad'=>$cantidad,
                    'precio'=>$precio
                );
                $_SESSION['carrito'][0]=$productos;
            }else{
                $idProductos = array_column($_SESSION['carrito'],"codigo");
                if(in_array($codigo,$idProductos)){
                    // $productos['cantidad'] = $productos['cantidad']+1;
                }else{
                    $cantidadPro=count($_SESSION['carrito']);
                    $productos = array(
                        'nameProducto'=>$nombrePro,
                        'codigo'=>$codigo,
                        'cantidad'=>$cantidad,
                        'precio'=>$precio
                    );
                    $_SESSION['carrito'][$cantidadPro]=$productos;
                }
                
            }
            
            
            // header("Location: ".$_SERVER['HTTP_REFERER']."");
            // $mensaje=print_r($_SESSION,true);        
            break;
            
    }   
}

if(isset($_POST['btnVaciar'])){
    header('location: Ingreso/index.php');
}


if(isset($_POST['btnComprar'])){
    if(isset($_SESSION['idUsuario'])){
        echo ".
            <html>
                <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
            <html>
            <script>
                Swal
                    .fire({
                        title: 'Contraseña o correo incorrectos',
                        text: 'Porfavor verifique si la informacion es correcta',
                        icon: 'error',
                        confirmButtonText: 'Continuar'
                    })
                    .then(resultado => {
                        if (resultado.value) {
                            window.location='index.php';
                        }else {    
                        }
                    });
            </script>";
            header('Location: ../Ingreso/index.php');
    }
    
}
?>