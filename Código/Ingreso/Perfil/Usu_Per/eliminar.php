<?php
$idUsuario = $_SESSION['idUsuario'];
$docType = $_SESSION['docType'];
$update = mysqli_query($DB,"UPDATE persona SET idEstado='0' WHERE id_persona='$idUsuario' AND docType='$docType'");
if($update){
    echo "          
        <html>
            <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
        <html>
        <script>
            Swal
            .fire({
                title: 'Se ha eliminado tu cuenta con exito',
                text: 'Te vamos a extrañar, recuerda que puedes volver a activar tu cuenta comunicandote con un administrador',
                icon: 'succes',
                showCancelButton: true,
                cancelButtonText: 'Terminar',
            })
            .then(resultado => {
                if (resultado.value) {
                    window.location='index.php';
                }else {    
                }
            });
        </script>";
}
?>