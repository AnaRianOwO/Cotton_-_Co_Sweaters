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

$estados = array(
    array( "Cancelado", "cancel", "fa-ban"),
    array( "En stock", "stock", "fa-warehouse"),
    array( "Empacado", "pack", "fa-boxes-packing"),
    array( "En camino", "way", "fa-truck-moving"),
    array( "Entregado", "delivered", "fa-house-circle-check"),
);

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
      <li> <a class="app-menu__item" a href="../../Manual de usuario (Administrador) - Cotton & Co Sweaters.pdf" style="top:450px">
         <i class="fa-solid fa-question"></i>
            <span class="app-menu__label">Ayuda</span></a>
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
                      <a class="btn btn-primary1" href="Excel/Informe_Factura_excel.php"><i class="bi bi-file-earmark-excel-fill"></i>&nbsp;<b>Excel</b>
                      </a>
                      <a href="Pdf/informe_factura.php" class="btn btn-primary2"><i class="bi bi-file-earmark-pdf-fill"></i><b>PDF</b></a>
                      <!-- <button type="button" class="btn btn-success1" data-toggle="modal" data-target="#create"><i class="fa-solid fa-file-circle-plus"></i><b> Añadir</b></a></button> -->
		                </div>
                  <thead>
                    <tr>
                        <th>Editar estado</th>
                        <th>Número de factura</th>
                        <th>Identificación comprador</th>
                        <th>Nombre comprador</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th>Total Compra</th>
                        <th>Estado</th>
                        <th>Ver factura</th>
                        <td></td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                            $SQL="SELECT * FROM persona P INNER JOIN usuario U on U.id_persona=P.id_persona INNER JOIN factura F ON P.id_persona = F.id_persona;"; 
                            $dato = mysqli_query($DB, $SQL);

                            if($dato -> num_rows >0){
                              while($fila=mysqli_fetch_array($dato)){
                          ?>
                    <tr>
                        <th><?php echo $fila['idFactura']?></th>
                        <th><a data-bs-toggle="modal" data-bs-target="#modalEstado" class="btn btn-warning" data-idfactura="<?php echo $fila['idFactura']?>"><i class="fa-solid fa-arrows-rotate"></i></a></th>
                        <th><?php echo $fila['id_persona']?></th>
                        <th><?php echo $fila['firstName']." ".$fila['secondName']." ".$fila['surname']." ".$fila ['secondSurname']?></th>
                        <th><?php echo $fila['phone']?></th>
                        <th><?php echo $fila['direccion']?></th>
                        <th><?php echo $fila['fecha']?></th>
                        <th><?php echo '$ '.$fila['total']?></th>
                        <td><div class="<?php echo $estados[$fila['idEstado']][1]?>"><i class="fa-solid fa-2x <?php echo $estados[$fila['idEstado']][2]?>"></i><?php echo "  ".$estados[$fila['idEstado']][0]?></div></td>
                        <th><a class="btn btn-info" href="Info_Factura/generador_factura.php?idFactura=<?php echo $fila['idFactura']?> "><i class="fa-solid fa-file"></i></a></th>
                        <!-- En esta parte se inserta el documento de la factura en pdf, en el href-->
                        <td>
                    
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

<!--================================= Ventana modal estados ===============================-->
    <div class="Ventana-modal">
        <div class="modal fade" id="modalEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización Estado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="Tablas/estado.php" method="post">
                    <?php
                      $idFactura = isset($_GET['idFactura']) ? $_GET['idFactura'] : "";
                      $factura = mysqli_query($DB, "SELECT F.idFactura, F.idEstado FROM factura F WHERE F.idFactura = '$idFactura';");
                      $fila = mysqli_fetch_array($factura);
                      
                    ?>
                        <div class="modal-body" style="overflow-y: auto !important;">
                            <h5>Estado Factura</h5>
                            <div>
                                <select name="idEstado" id="idEstado" class="form-control">
                                    <option value="0" <?php if($fila['idEstado'] == '0') echo "selected"; ?>>Cancelado</option>
                                    <option value="1" <?php if($fila['idEstado'] == '1') echo "selected"; ?>>En stock</option>
                                    <option value="2" <?php if($fila['idEstado'] == '2') echo "selected"; ?>>Empacado</option>
                                    <option value="3" <?php if($fila['idEstado'] == '3') echo "selected"; ?>>En camino</option>
                                    <option value="4" <?php if($fila['idEstado'] == '4') echo "selected"; ?>>Entregado</option>
                                </select>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="idFactura" id="idFactura" value="<?php echo $fila['idFactura'] ?>">
                            <input type="submit" name="btnActivar" value="Actualizar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  <!--================================= Ventana modal estados ===============================-->
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

  $(document).ready(function(){
    
    var queryString = window.location.search;
    console.log("La URL tiene esto de más "+queryString);

    if (queryString !== "") {
      let url_factura = queryString.split("=")[1];
      $("#modalEstado").modal("show");
    }

  });

  var boton = document.getElementsByClassName('btn-warning');
  console.log(boton);

  for (let i = 0; i < boton.length; i++) {
    boton[i].addEventListener('click', (e)=>{
      let dato_factura = boton[i].dataset.idfactura;
      console.log(dato_factura);

      var queryString = window.location.search;

      if(queryString == ""){
        window.location.href = "?idFactura="+dato_factura; 
      } else{
        let fact = queryString.split("=")[1];

        if(fact == dato_factura){
          console.log("modal normal");
          $("#modalActualizar").modal("show");
        }else{
          window.location.href = "?idFactura="+dato_factura;           
        }
      }
    })
  }


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