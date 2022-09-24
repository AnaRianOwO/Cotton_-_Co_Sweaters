<?php 

if(isset($_SESSION['carrito'])){
    $myCar=$_SESSION['carrito'];
}


if(isset($_SESSION['carrito'])){
    for ($i=0; $i<=count($myCar)-1; $i++) { 
        if(isset($myCar[$i])){
            if($myCar[$i]!=NULL){
                if(!isset($myCar["cantidad"])){
                    $myCar['carrito'] = '0';
                }else{
                    $myCar['cantidad'] = $myCar['cantidad'];
                }
                $total_cantidad = $myCar['cantidad'];
                $total_cantidad ++;
                if(!isset($totalCantidad)){
                    $totalCantidad = '0';
                }else{
                    $totalCantidad = $totalCantidad;
                }
                $totalCantidad += $total_cantidad;
            }
        }
    }
}

if(!isset($totalCantidad)){
    $totalCantidad = '';
}else{
    $totalCantidad = $totalCantidad;
}
?>


<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">Mi tienda</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red; curos: pointer;"><i class="fas fa-shopping-cart"></i><?php echo $totalCantidad; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>