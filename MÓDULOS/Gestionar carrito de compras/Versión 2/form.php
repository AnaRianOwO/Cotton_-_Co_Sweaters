<form action="agregar_al_carrito.php" method="post">
    <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
    <button class="button is-primary">
        <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
    </button>
</form>