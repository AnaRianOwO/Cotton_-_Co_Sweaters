<?php
function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre, $precio, $descripcion)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO productos(nombre, precio, descripcion) VALUES(?, ?, ?)");
    return $sentencia->execute([$nombre, $precio, $descripcion]);
}