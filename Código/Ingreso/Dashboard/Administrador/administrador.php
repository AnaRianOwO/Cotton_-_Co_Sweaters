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
            <li>
                <a class="dropdown-item" href="opciones.php"><i class="fa fa-cog fa-lg"></i> Settings</a>
            </li>
            <li>
                <a class="dropdown-item" href="perfil_admin.php"><i class="fa fa-user fa-lg"></i> Profile</a>
            </li>
            <li>
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
                          <a class="btn btn-warning" href="Tablas/editar_admin.php?idAdministrador=<?php echo $fila['idAdministrador']?> "><i class="fa-solid fa-arrows-rotate"></i></a>

                          <a class="btn btn-danger btn-del"  href="Tablas/eliminar_admin.php?idAdministrador=<?php  echo $fila['idAdministrador']?>"><i class="fa-regular fa-trash-can"></i></a>
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

  </script> 


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