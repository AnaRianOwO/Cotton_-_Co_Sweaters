<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario blah blah</title>
</head>
<body>
    
    <form action="">
        <h2>Formulario</h2>
        <div>
            <label for="Nombre">Nombre</label>
            <input type="text">
        </div>
        <div>
            <label for="Email">Email</label>
            <input type="text">
        </div>
        <div>
            <input type="checkbox"> Usted acepta los <span onclick="TyC()">Términos y Condiciones de la aplicación</span>
        </div>

        <button type="submit">Enviar</button>
    </form>

    <div class="contenedorModal">
        <!--<link id="modal" rel="import" href="terminosYCondiciones.html">-->
        <?php require 'terminosYCondiciones.html'; ?>
    </div>
    <script src="funciowones.js"></script>
</body>
</html>