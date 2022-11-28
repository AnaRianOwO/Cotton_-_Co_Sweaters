<?php

include("../../../DB/db.php");
session_start();

$idAdministrador = $_SESSION['idAdministrador'];

if(!isset($_SESSION['idAdministrador'])){
    header('Location: ../../index.php');    

}
$sql="SELECT * FROM administrador WHERE idAdministrador = '$idAdministrador'";
$query=mysqli_query($DB,$sql);

$row=mysqli_fetch_array($query);

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
                <a class="treeview-item" href="../Administrador/administrador.php"><i class="icon fa fa-circle-o"></i> Administradores</a>
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
                <a class="treeview-item" href="Ventas/ventas.php"><i class="icon fa fa-circle-o"></i> Ventas</a>
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
          <h1><i class="fa-solid fa-address-book"></i>Lista de Ventas</h1>
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
                      <a class="btn btn-primary1" href="Excel/Informe_Factura_excel.php"><i class="bi bi-file-earmark-excel-fill"></i><b>Excel</b>
                      </a>
                      <a href="Pdf/informe_factura.php" class="btn btn-primary2"><i class="bi bi-file-earmark-pdf-fill"></i><b>PDF</b></a>
                      <!-- <button type="button" class="btn btn-success1" data-toggle="modal" data-target="#create"><i class="fa-solid fa-file-circle-plus"></i><b> Añadir</b></a></button> -->
		                </div>
                  <thead>
                    <tr>
                        <th>Número de factura</th>
                        <th>Identificación comprador</th>
                        <th>Nombre comprador</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th>Total Compra</th>
                        <th>Ver factura</th>
                        <td></td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                            $SQL="SELECT f.idFactura, u.idUsuario, u.firstName, u.secondName, u.surname, u.secondSurname, u.phone, u.direccion, f.fecha, f.total FROM factura f INNER JOIN usuario u ON u.idUsuario = f.idUsuario;"; 
                            $dato = mysqli_query($DB, $SQL);

                            if($dato -> num_rows >0){
                              while($fila=mysqli_fetch_array($dato)){
                          ?>
                    <tr>
                      <th><?php echo $fila['idFactura']?></th>
                        <th><?php echo $fila['idUsuario']?></th>
                        <th><?php echo $fila['firstName']." ".$fila['secondName']." ".$fila['surname']." ".$fila ['secondSurname']?></th>
                        <th><?php echo $fila['phone']?></th>
                        <th><?php echo $fila['direccion']?></th>
                        <th><?php echo $fila['fecha']?></th>
                        <th><?php echo '$ '.$fila['total']?></th>
                        <th><a class="btn btn-info" href="Info_Factura/generador_factura.php?idFactura=<?php echo $fila['idFactura']?> "><i class="fa-solid fa-file"></i></a></th>
                        <!-- En esta parte se inserta el documento de la factura en pdf, en el href-->
                        <td>
                          <!-- <a class="btn btn-warning" href="Tablas/editar_venta.php?idFactura=<?php //echo $fila['idFactura']?> "><i class="fa-solid fa-arrows-rotate"></i></a> -->

                          <a class="btn btn-danger btn-del"  href="Tablas/eliminar_venta.php?idFactura=<?php  echo $fila['idFactura']?>"><i class="fa-regular fa-trash-can"></i></a>
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

<!--=================================Modal===============================-->
<script>

  $('.btn-del').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
    title: '¿Estás seguro de eliminar este factura?',
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
        'La factura fue eliminada.',
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

<script src="package/dist/sweetalert2.all.js"></script>
<script src="package/dist/sweetalert2.all.min.js"></script>
<script src="package/jquery-3.6.0.min.js"></script>


<script src="js/reloj.js"></script>
</html>