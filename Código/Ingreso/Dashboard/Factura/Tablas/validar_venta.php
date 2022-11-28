<?php
  require_once ("../../../../DB/db.php");
  
  if(isset($_POST)){
    if (strlen($_POST['idAdministrador']) >=1 && strlen($_POST['docType'])  >=1 && strlen($_POST['firstName'])  >=1 
    && strlen($_POST['secondName'])  >=1 && strlen($_POST['surname']) >= 1 && strlen($_POST['secondSurname']) >= 1 
    && strlen($_POST['indicativo']) >= 1 && strlen($_POST['phone']) >= 1 && strlen($_POST['correo']) >= 1 
    && strlen($_POST['direccion']) >= 1 && strlen($_POST['pass']) >= 1 && strlen($_POST['idCiudad']) >= 1 && strlen($_POST['idEstado']) >= 1) {
      $idAdministrador = trim($_POST['idAdministrador']);
      $docType = trim($_POST['docType']);
      $firstName = trim($_POST['firstName']);
      $secondName = trim($_POST['secondName']);
      $surname = trim($_POST['surname']);
      $secondSurname = trim($_POST['secondSurname']);
      $indicativo = trim($_POST['indicativo']);
      $phone = trim($_POST['phone']);
      $correo = trim($_POST['correo']);
      $direccion = trim($_POST['direccion']);
      $pass = trim($_POST['pass']);
      $idCiudad = trim($_POST['idCiudad']);
      $idEstado = trim($_POST['idEstado']);
  
  
    $consulta = "INSERT INTO administrador (idAdministrador, docType, firstName, secondName, surname, secondSurname, indicativo, phone, correo, direccion, pass, idCiudad, idEstado)
    VALUES ('$idAdministrador', '$docType','$firstName','$secondName', '$surname', '$secondSurname', '$indicativo', '$phone', '$correo', '$direccion', '$pass', '$idCiudad', '$idEstado' )";
      $resultado=mysqli_query($DB, $consulta);
  
      if($resultado){
  echo'Correcto';
        
      }else{
        echo 'Ocurrio un error al guardar los datos';
      }
  }else{
    echo 'No data';
  }
  }
?>