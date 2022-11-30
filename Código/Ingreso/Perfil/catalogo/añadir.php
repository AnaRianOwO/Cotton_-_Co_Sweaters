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

        case 'Vaciar':
            echo "<script>alert('Hola que mas');</script>";
            // unset($_SESSION['carrito']);
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
        $consult = mysqli_query($con, "SELECT f.idFactura FROM factura f WHERE f.idFactura = (SELECT MAX(f.idFactura) FROM factura f) LIMIT 1;");
        // $consult = mysqli_query($con, "SELECT * FROM factura ORDER BY SUBSTRING(idFactura,3,3), cast(Substring(idFactura,2,2) as int);");

        $fafactura = mysqli_fetch_assoc($consult);
        $codigo = substr($fafactura['idFactura'], 1);
        print_r($fafactura['idFactura']);
        print_r($codigo);
        print_r(mysqli_insert_id($con));
        $codigo = intval($codigo);
        $codigo+=1;
    }
    // $consulta = mysqli_query($con, "SELECT * FROM producto P INNER JOIN detallefactura D on D.codigo=P.codigo INNER JOIN factura F on F.idFactura=D.idFactura INNER JOIN usuario U on U.idUsuario=F.idUsuario");
    $tabProd = mysqli_query($con, "SELECT * FROM producto");
    $product = mysqli_fetch_array($tabProd);
    $total = $_SESSION['total'];
    // $inner = mysqli_fetch_array($consulta);
    date_default_timezone_set('America/Bogota');
    $FecHr = date('Y-m-d H:i:s');
    $factura = mysqli_query($con, "INSERT INTO factura VALUES ('F$codigo','$idUsuario','$FecHr','$total')");

    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice=>$productos){ 
            $consu = mysqli_query($con, "SELECT D.idDetalle FROM detallefactura D WHERE D.idDetalle = (SELECT MAX(D.idDetalle) FROM detallefactura D) LIMIT 1;");
            if(!isset($consu)){
                $valor=1;
            }else{
                $facturita = mysqli_fetch_assoc($consu);
                $valor = substr($facturita['idDetalle'], 1);
                print_r($valor);
                $valor = intval($valor);
                $valor+=1;
            }
            // $tabFactura = mysqli_query($con, "SELECT f.idFactura FROM factura f WHERE f.idFactura = (SELECT MAX(f.idFactura) FROM factura f) LIMIT 1;");
            // $facturitaa = mysqli_fetch_assoc($tabFactura);
            // $tabFactura = mysqli_fetch_array(mysqli_query($con, "SELECT LAST(idFactura) FROM factura"));
            // $facturitaa = mysqli_fetch_assoc($tabFactura);
            // $facTabla = $tabFactura['idFactura'];
            $proTabla = $productos["cantidad"];
            $prodTabla = $productos["codigo"];
            $detalle = mysqli_query($con, "INSERT INTO detallefactura VALUES ('D$valor','$proTabla','$prodTabla','F$codigo')");
        }
        echo "
                .
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