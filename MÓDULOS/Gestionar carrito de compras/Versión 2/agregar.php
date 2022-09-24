<?php
include_once "funciones.php";
if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}
agregarProductoAlCarrito($_POST["id_producto"]);
header("Location: tienda.php");

function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}

?>