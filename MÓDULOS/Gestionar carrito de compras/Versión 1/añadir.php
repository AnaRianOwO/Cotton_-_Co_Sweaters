<?php
session_start();

if(isset($_SESSION['carrito']) || isset($_POST['titulo'])){
    if(isset($_SESSION['carrito'])){
        $myCar=$_SESSION['carrito'];
        if(isset($_POST['titulo'])){
            $myCar = $_SESSION['carrito'];
            $titulo=$_POST['titulo'];
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            $donde=-1;
            if($donde != -1){
                $cuanto=$myCar[$donde]['carrito'] + $cantidad;
                $myCar[$donde]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad);
            }else{
                $myCar[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad);
            }
        }
    }else{
        $myCar = $_SESSION['carrito'];
        $titulo=$_POST['titulo'];
        $precio=$_POST['precio'];
        $cantidad=$_POST['cantidad'];
        $myCar[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad);
    }
    $_SESSION['carrito']=$myCar;
}

header("Location: ".$_SERVER['HTTP_REFERER']."");


?>