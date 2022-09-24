
<strong>Ver carrito <?php
include_once "funciones.php";
$conteo = count(obtenerIdsDeProductosEnCarrito());
if ($conteo > 0) {
    printf("(%d)", $conteo);
}
?>&nbsp;<i class="fa fa-shopping-cart"></i></strong>