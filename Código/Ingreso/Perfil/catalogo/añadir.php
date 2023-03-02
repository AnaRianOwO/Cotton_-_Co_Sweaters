<?php 
require_once ("../../../DB/db.php");
// error_reporting(0);
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
            
        
            break;

        case 'Vaciar':
            echo "<script>alert('Hola que mas');</script>";
            break;
        default:
            
    }   
}

if(isset($_POST['btnVaciar'])){
    unset($_SESSION['carrito']);
}


if(isset($_POST['btnComprar'])){
    if(!isset($consult)){
        $codigo=1;
    }else{
        $consult = mysqli_query($DB, "SELECT F.idFactura FROM factura F ORDER BY CAST(REPLACE(F.idFactura,'F','') AS int) DESC LIMIT 1;");
        $fafactura = mysqli_fetch_assoc($consult);
        $codigo = substr($fafactura['idFactura'], 1);
        $codigo = intval($codigo);
        $codigo+=1;
    }
    $tabProd = mysqli_query($DB, "SELECT * FROM producto");
    $product = mysqli_fetch_assoc($tabProd);
    $total = $_SESSION['total'];
    date_default_timezone_set('America/Bogota');
    $FecHr = date('Y-m-d H:i:s');
    $factura = mysqli_query($DB, "INSERT INTO factura VALUES ('F$codigo','$idUsuario','$FecHr','$total')");

    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice=>$productos){ 
            $consu = mysqli_query($DB, "SELECT D.idDetalle FROM detallefactura D ORDER BY CAST(REPLACE(D.idDetalle,'D','') AS int) DESC LIMIT 1;");
            if(!isset($consu)){
                $valor=1;
            }else{
                $facturita = mysqli_fetch_assoc($consu);
                $valor = substr($facturita['idDetalle'], 1);
                $valor = intval($valor);
                $valor+=1;
            }
            $proTabla = $productos["cantidad"];
            $prodTabla = $productos["codigo"];
            $detalle = mysqli_query($DB, "INSERT INTO detallefactura VALUES ('D$valor','$proTabla','$prodTabla','F$codigo')");
        }
        echo "
                
                <html>
                    <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                <html>
                <script>
                    Swal
                        .fire({
                            title: 'Compra exitosa',
                            text: '¿\n\nQuiere generar su factura en estos momentos?',
                            icon: 'succes',
                            showCancelButton: true,
                            confirmButtonText: 'Sí, quiero generar mi factura',
                            cancelButtonText: 'Cancelar',
                        })
                        .then(resultado => {
                            if (resultado.value) {
                                window.location='index.php';
                            }else {    
                            }
                        });
                </script>";
    }
    unset($_SESSION['carrito']);
}
?>