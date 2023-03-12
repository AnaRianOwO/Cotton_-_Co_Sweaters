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
            <li> <a class="dropdown-item" a href="../../../Manual de usuario (Administrador) - Cotton & Co Sweaters.pdf">
              <i class="fa-solid fa-question"></i>
                <span class="app-menu__label">Ayuda</span></a>
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
                <a class="treeview-item" href="productos.php"><i class="icon fa fa-circle-o"></i> Productos</a>
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
          <h1><i class="fa-solid fa-address-book"></i> Lista de Productos</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                <div>
                      <a class="btn btn-primary1" href="Excel/Informe_Producto_excel.php"><i class="bi bi-file-earmark-excel-fill"></i>&nbsp;<b>Excel</b>
                      </a>
                      <a href="Pdf/Informe_Producto.php" class="btn btn-primary2"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;<b>PDF</b></a>
                      <a data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-success1"><i class="bi bi-bag-plus-fill"></i>&nbsp;<b>Agregar</b></a>
		                </div>
                  <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <td></td>
                  
                    </tr>
                  </thead>
                  <tbody>
                    <?php            
                        $consulta="SELECT * FROM producto P;"; 

                        $resultado = mysqli_query($DB, $consulta);
                        
                        if($resultado -> num_rows >0){
                          while($data=mysqli_fetch_array($resultado)){
                                ?>
                                <tr>
                                  <th><?php echo $data['codigo'] ?></th>
                                    <th><?php echo $data['nameProducto'] ?></th>
                                    <th><?php echo '$ '.$data['precio'] ?></th>
                                    <th><?php echo $data['stock'] ?></th>
                                    <th><?php echo $data['descripcion'] ?></th>
                                    <th><img height="50px" src="data:image/jpg;base64, <?php echo base64_encode($data['imagen']) ?>"></th>
                                    <td><?php echo $data['idEstado'] ?></th>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#modalActualizar" data-codigo="<?php echo $data['codigo'] ?>" class="btn btn-info"><i class="fa-solid fa-arrows-rotate"></i></a>

                                        <a href="Tablas/delete.php?codigo=<?php echo $data['codigo'] ?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                            <tr class="text-center">
                            <td colspan="16">No hay productos</td>
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

<script>
 
 $(document).ready(function(){
    
    var queryString = window.location.search;
    console.log("La URL tiene esto de más "+queryString);

    if (queryString !== "") {
      let url_codigo = queryString.split("=")[1];
      $("#modalActualizar").modal("show");
    }

  });

  var boton = document.getElementsByClassName('btn-info');

  for (let i = 0; i < boton.length; i++) {
    boton[i].addEventListener('click', (e)=>{
      let dato_codigo = boton[i].dataset.codigo;
      console.log(dato_codigo);

      var queryString = window.location.search;

      if(queryString == ""){
        window.location.href = "?codigo="+dato_codigo; 
      } else{
        let codigo = queryString.split("=")[1];

        if(codigo == dato_codigo){
          console.log("modal normal");
          $("#modalActualizar").modal("show");
        }else{
          window.location.href = "?codigo="+dato_codigo;           
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="Tablas/update.php" method="post">
                    <?php
                      $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : "";
                      $producto = mysqli_query($DB, "SELECT P.codigo, P.nameProducto, P.precio, P.stock, P.descripcion, P.imagen, P.idEstado FROM producto P WHERE P.codigo = '$codigo';");
                      $fila = mysqli_fetch_array($producto);
                    ?>
                        <div class="modal-body" style="overflow-y: auto !important;">
                            <h5>Nombre Producto</h5>
                            <div>
                                <input type="text" name="nameProducto" id="nameProducto" placeholder="Nombre" value="<?php echo $fila['nameProducto'] ?>" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Precio</h5>
                            <div>
                                <input type="text" name="precio" id="precio" placeholder="Descripción" value="<?php echo $fila['precio']?>" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Stock</h5>
                              <input type="text" name="stock" placeholder="Stock" value="<?php echo $fila['stock'] ?>" style="border: none; border-bottom: 2px solid black;">
                            <h5>Descripción</h5>
                            <div>
                                <input type="textarea" name="descripcion" placeholder="Descripción" value="<?php echo $fila['descripcion'] ?>" style="width:400px; border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Estado</h5>
                            <input type="" name="idEstado" placeholder="idEstado" value="<?php echo $fila['idEstado'] ?>" style="width: 40px;border: none; border-bottom: 2px solid black;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="codigo" id="codigo" value="<?php echo $fila['codigo'] ?>">
                            <input type="hidden" name="accion" value="editar_registro">
                            <input type="submit" name="btnActivar" value="Actualizar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!--================================= Ventana modal FIN ===============================-->
   <!--================================= Nueva ventana modal ===============================-->

   <div class="Ventana-modal">
        <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización administrador</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="Tablas/validar_producto.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body" style="overflow-y: auto !important;">
                            <h5>Código Producto</h5>
                            <div>
                                <input type="text" name="codigo" id="codigo" placeholder="Nombre" value="" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Nombre</h5>
                            <div>
                                <input type="text" name="nameProducto" id="nameProducto" placeholder="Nombre" value="" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Precio</h5>
                            <div>
                                <input type="text" name="precio" id="precio" placeholder="Descripción" value="" style="border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Stock</h5>
                              <input type="text" name="stock" placeholder="Stock" value="" style="border: none; border-bottom: 2px solid black;">
                            <h5>Descripción</h5>
                            <div>
                                <input type="text" name="descripcion" placeholder="Descripción" value="" style="width:400px; border: none; border-bottom: 2px solid black;">
                            </div>
                            <h5>Imagen</h5>
                            <div>
                                <input type="file" name="imagen" id="imagen" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="btnActivar" value="Crear" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--================================= Ventana modal FIN ===============================-->

    <br>
      <?php include "Tablas/fecha.php"?>
      <center>
        <p class="ml-auto"><strong> Colombia </strong><?php echo fecha(); ?></p>
        <div class="reloj">
          <h5><span id="tiempo">00 : 00 : 00</span></h5>
        </div>
      </center>
    <br>
  </body>

<div id="paginador" class=""></div>
<!-- <script src="package/dist/sweetalert2.all.js"></script>
<script src="package/dist/sweetalert2.all.min.js"></script>
<script src="package/jquery-3.6.0.min.js"></script> -->


<script src="js/reloj.js"></script>
</html>