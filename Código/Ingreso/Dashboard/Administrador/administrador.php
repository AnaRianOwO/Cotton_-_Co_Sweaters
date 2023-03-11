<?php
require_once ("../../../DB/db.php");
session_start();

$idAdministrador = $_SESSION['idAdministrador'];
$docType = $_SESSION['docType'];

if(!isset($_SESSION['idAdministrador'])){
    header('Location: ../../index.php');    

}
$sql = mysqli_query($DB, "SELECT * FROM administrador A INNER JOIN persona P ON A.id_persona = P.id_persona AND A.docType = P.docType WHERE A.id_persona = '$idAdministrador' AND A.docType = '$docType'");
$row = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Tienda virtual de Cotton & Co Sweaters">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#009688">
    <title>Cotton & Co Sweaters - Tienda Virtual</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/be71717483.js" crossorigin="anonymous"></script>
  </head>

  <body class="app sidebar-mini">
    <!-- Barra de navegacion-->
    <header class="app-header"><a class="app-header__logo" href="../dashboard.php">Admin</a>
      <!-- Boton barra lateral--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Barra de navegación menu-->
      <ul class="app-nav">
        <!-- Menu usuario-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">

          <li> <a class="dropdown-item" a href="../../Manual de usuario (Administrador) - Cotton & Co Sweaters.pdf">
         <i class="fa-solid fa-question"></i>
            <span class="app-menu__label">Ayuda</span></a>
            
                <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </header>

    <!-- Navegación-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $row['firstName'] ?></p>
          <p class="app-sidebar__user-name"><?php echo $row['surname'] ?></p>
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="../dashboard.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label"> Usuarios</span>
                  <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="../Usuario/usuarios.php"><i class="icon fa fa-circle-o"></i> Usuarios</a>
            </li> 
          </ul>
        </li>

        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa-solid fa-user-tie" aria-hidden="true"></i>
                <span class="app-menu__label"> Administrador</span>
                  <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="administrador.php"><i class="icon fa fa-circle-o"></i> Administradores</a>
            </li>
          </ul>
        </li>

        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa-solid fa-bag-shopping" aria-hidden="true"></i>
                <span class="app-menu__label"> Producto</span>
                  <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="../Producto/productos.php"><i class="icon fa fa-circle-o"></i> Productos</a>
            </li>
          </ul>
        </li>

        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa-solid fa-cart-shopping" aria-hidden="true"></i>
                <span class="app-menu__label">Ventas</span>
                  <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="../Factura/factura.php"><i class="icon fa fa-circle-o"></i> Ventas</a>
            </li>
          </ul>
        </li>

        <li><a class="app-menu__item" href="../logout.php">
            <i class="app-menu__icon fa-solid fa-right-from-bracket"></i>
            <span class="app-menu__label">Logout</span></a>
        </li>
      </ul>

      
     </aside>
<!--======================================================================================================-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa-solid fa-address-book"></i> Lista de Administradores</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Inicio</a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                <div>
                      <a class="btn btn-primary1" href="Excel/Informe_Admin_excel.php"><i class="bi bi-file-earmark-excel-fill"></i>&nbsp;<b>Excel</b>
                      </a>
                      <a href="Pdf/informe_administradores.php" class="btn btn-primary2"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;<b>PDF</b></a>
                      <a href="Tablas/insertar_admin.php" class="btn btn-success1"><i class="icon bi bi-person-plus-fill"></i><b>Crear</b></a>
		                </div>
                  <thead>
                    <tr>
                      <th>Número de identidad</th>
                        <th>Tipo de Documento</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Indicativo</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <td></td>
                  
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                            include("../../../DB/db.php");
                            $SQL="SELECT * FROM administrador A INNER JOIN persona P ON A.id_persona=P.id_persona INNER JOIN ciudad C On P.idCiudad=C.idCiudad;"; 

                            $dato = mysqli_query($DB, $SQL);

                            if($dato -> num_rows >0){
                              while($fila=mysqli_fetch_array($dato)){
                          ?>
                    <tr>
                      <th><?php echo $fila['id_persona']?></th>
                        <th><?php echo $fila['docType']?></th>
                        <th><?php echo $fila['firstName']?></th>
                        <th><?php echo $fila['secondName']?></th>
                        <th><?php echo $fila['surname']?></th>
                        <th><?php echo $fila['secondSurname']?></th>
                        <th><?php echo $fila['indicativo']?></th>
                        <th><?php echo $fila['phone']?></th>
                        <th><?php echo $fila['correo']?></th>
                        <th><?php echo $fila['nameCiudad']?></th>
                        <th><?php echo $fila['idEstado']?></th>
                        <td>
                          <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#modalActualizar" data-idpersona="<?php  echo $fila['id_persona']?>" data-doctype="<?php echo $fila['docType'] ?>" ><i class="fa-solid fa-arrows-rotate"></i></a>

                          <a class="btn btn-danger btn-del"  href="Tablas/eliminar_admin.php?id_persona=<?php  echo $fila['id_persona']?>&docType=<?php echo $fila['docType'] ?>"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php
                            }
                            }else{
                                ?>
                                <tr class="text-center">
                                <td colspan="16">No existen registros</td>
                                </tr>
                              <?php  
                            }
                            ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->

  </body>

  <script>

    $('.btn-del').on('click', function(e){
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
      title: 'Estás seguro de eliminar este usuario?',
      text: "¡No podrás revertir esto!!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Eliminar', 
      cancelButtonText: 'Cancelar', 
    }).then((result)=>{
        if(result.value){
            if (result.isConfirmed) {
        Swal.fire(
          'Eliminado!',
          'El usuario fue eliminado.',
          'success'
        )
      }
            document.location.href= href;
        }   
    })
  })

  $(document).ready(function(){
    
    var queryString = window.location.search;
    console.log("La URL tiene esto de más "+queryString);

    if (queryString !== "") {
      let idPersona = queryString.split("=")[1].split("&")[0];
      let docType = queryString.split("=")[3];
      console.log("modal normal");
      $("#modalActualizar").modal("show");
    }

  });

  var boton = document.getElementsByClassName('btn-warning');

  for (let i = 0; i < boton.length; i++) {
    boton[i].addEventListener('click', (e)=>{
      let dato_id_persona = boton[i].dataset.idpersona;
      let dato_doc_type= boton[i].dataset.doctype;
      console.log(dato_id_persona, dato_doc_type);

      var queryString = window.location.search;

      if(queryString == ""){
        window.location.href = "?id_persona="+dato_id_persona+"&docType="+dato_doc_type; 
      } else{
        let idPersona = queryString.split("=")[1].split("&")[0];
        let docType = queryString.split("=")[3];

        if(idPersona == dato_id_persona && docType == dato_doc_type){
          console.log("modal normal");
          $("#modalActualizar").modal("show");
        }else{
          window.location.href = "?id_persona="+dato_id_persona+"&docType="+dato_doc_type;           
        }
      }
    })
  }

  </script> 
<!--================================= Ventana modal actualizar (Anibal wtf) ===============================-->

<div class="Ventana-modal">
        <div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización administrador</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="Tablas/funciones_admin.php" method="post">
                    <?php
                      $id_persona = isset($_GET['id_persona']) ? $_GET['id_persona'] : "";
                      $docType = isset($_GET['docType']) ? $_GET['docType'] : "";
                      $perfil = mysqli_query($DB, "SELECT A.id_persona, A.docType, P.firstName, P.secondName, P.surname, P.secondSurname, P.indicativo, P.phone, P.correo, P.idEstado, P.idCiudad, C.nameCiudad FROM administrador A INNER JOIN persona P ON A.id_persona = P.id_persona INNER JOIN ciudad C ON P.idCiudad = C.idCiudad WHERE A.id_persona = '$id_persona' AND A.docType = '$docType'");
                      $fila = mysqli_fetch_array($perfil);
                    ?>
                        <div class="modal-body" style="overflow-y: auto !important;">
                            <h5>Nombres</h5>
                            <div>
                                <input type="text" name="firstName" id="firstName" placeholder="Primer nombre" value="<?php echo $fila['firstName'] ?>" style="border: none; border-bottom: 2px solid black;">
                                <input type="text" name="secondName" id="secondName" placeholder="Segundo nombre" value="<?php echo $fila['secondName'] ?>" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Apellidos</h5>
                            <div>
                                <input type="text" name="surname" id="surname" placeholder="Primer apellido" value="<?php echo $fila['surname']?>" style="border: none; border-bottom: 2px solid black;">
                                <input type="text" name="secondSurname" id="" placeholder="Segundo apellido" value="<?php echo $fila['secondSurname']?>" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Correo</h5>
                            <input type="text" name="correo" placeholder="Correo" value="<?php echo $fila['correo'] ?>" style="border: none; border-bottom: 2px solid black;">
                            <h5>Contacto</h5>
                            <div>
                                <input type="" name="indicativo" placeholder="Indicativo" value="<?php echo $fila['indicativo'] ?>" style="width: 40px;border: none; border-bottom: 2px solid black;">
                                <input type="" name="phone" placeholder="Numero" value="<?php echo $fila['phone'] ?>" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Ciudad</h5>
                            <div>
                                <select name="idCiudad" id="idCiudad" style="right: 50px">
                                    <?php $consult = mysqli_query($DB,"SELECT * FROM ciudad;"); ?>
                                    <option value="<?php echo $fila['idCiudad']; ?>"><?php echo $fila['nameCiudad']; ?></option>
                                    <?php while($ciudades= mysqli_fetch_array($consult)){ ?>
                                        <option value="<?php echo $ciudades['idCiudad'];?>"><?php echo $ciudades['nameCiudad'];?></option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                            <h5>Estado</h5>
                            <input type="" name="idEstado" placeholder="idEstado" value="<?php echo $fila['idEstado'] ?>" style="width: 40px;border: none; border-bottom: 2px solid black;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="id_persona" id="id_persona" value="<?php echo $fila['id_persona'] ?>">
                            <input type="hidden" name="docType" id="docType" value="<?php echo $fila['docType'] ?>">
                            <input type="hidden" name="accion" value="editar_registro">
                            <input type="submit" name="btnActivar" value="Actualizar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!--================================= Ventana modal FIN ===============================-->
  </body>
<!--=================================Modal===============================-->
<script>

  $('.btn-del').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
    title: 'Estás seguro de eliminar este administrador?',
    text: "¡No podrás revertir esto!!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar', 
    cancelButtonText: 'Cancelar', 
  }).then((result)=>{
      if(result.value){
          if (result.isConfirmed) {
      Swal.fire(
        'Eliminado!',
        'El administrador fue eliminado.',
        'success'
      )
    }
          document.location.href= href;
      }   
  })
  })

</script>  
<a href="../Código/Manual de usuario (Administrador) - Cotton & Co Sweaters.pdf">Ayuda</a>
<!--Fecha y Reloj-->  
<br>
  <?php include "Tablas/fecha.php"?>
  <center>
    <p class="ml-auto"><strong> Colombia </strong><?php echo fecha(); ?></p>
    <div class="reloj">
      <h5><span id="tiempo">00 : 00 : 00</span></h5>
    </div>
  </center>
<br>

<div id="paginador" class=""></div>
<script src="package/dist/sweetalert2.all.js"></script>
<script src="package/dist/sweetalert2.all.min.js"></script>
<script src="package/jquery-3.6.0.min.js"></script>

<script src="js/reloj.js"></script>
</html>