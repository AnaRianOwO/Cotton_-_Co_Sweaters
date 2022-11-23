<?php
$mensaje="";

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

        case 'Vaciar':
            echo "<script>alert('Hola que mas');</script>";
            // unset($_SESSION['carrito']);
            break;
        default:
            
    }   
}

if(isset($_POST['btnVaciar'])){
    session_unset();
}

if(isset($_POST['btnComprar'])){
    $sql = mysqli_query($con, "SELECT * FROM producto P INNER JOIN detallefactura D on D.codigo=P.codigo INNER JOIN factura F on F.idFactura=D.idFactura INNER JOIN usuario U on U.idUsuario=F.idUsuario WHERE '$id'");
    $row = mysqli_num_rows($sql);
    if($row>0){
        while($data = mysqli_fetch_array($sql)){
            $insert = mysqli_query($con, "INSERT INTO factura VALUES ");
        }
    }
}
?>