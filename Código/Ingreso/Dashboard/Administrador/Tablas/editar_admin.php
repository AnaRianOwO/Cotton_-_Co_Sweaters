<?php
include("../../../../DB/db.php");

$id_persona= $_GET['id_persona'];

$consulta= "SELECT * FROM administrador A INNER JOIN persona P on A.id_persona=P.id_persona INNER JOIN ciudad C ON P.idCiudad=C.idCiudad WHERE A.id_persona = '$id_persona'";
$resultado = mysqli_query($DB, $consulta);
$administrador = mysqli_fetch_assoc($resultado);

$sqlCiudad = "SELECT * FROM ciudad ORDER BY nameCiudad ASC";
$resultadoCiudad = mysqli_query($DB, $sqlCiudad);
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/es.css">
</head>

<body id="page-top">


</body>
</html>