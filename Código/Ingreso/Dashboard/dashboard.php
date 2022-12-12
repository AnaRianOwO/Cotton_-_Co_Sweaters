<?php

include("../../DB/db.php");
session_start();

$idAdministrador = $_SESSION['idAdministrador'];

if(!isset($_SESSION['idAdministrador'])){
    header('Location: ../index.php');    

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
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Font-icon css-->

    <script src="https://kit.fontawesome.com/be71717483.js" crossorigin="anonymous"></script>
  </head>

  <body class="app sidebar-mini">
    <!-- Barra de navegacion-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">Admin</a>
      <!-- Boton barra lateral--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Barra de navegación menu-->
      <ul class="app-nav">
        <!-- Menu usuario-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>
                <a class="dropdown-item" href="#" id="ajustes"><i class="fa fa-cog fa-lg"></i> Settings</a>
            </li>
            <li>
                <a class="dropdown-item" href="perfil_admin.php"><i class="fa fa-user fa-lg"></i> Profile</a>
            </li>
            <li>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
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
            <a class="app-menu__item" href="dashboard.php">
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
                <a class="treeview-item" href="Usuario/usuarios.php"><i class="icon fa fa-circle-o"></i> Usuarios</a>
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
                <a class="treeview-item" href="Administrador/administrador.php"><i class="icon fa fa-circle-o"></i> Administradores</a>
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
                <a class="treeview-item" href="Producto/productos.php"><i class="icon fa fa-circle-o"></i> Productos</a>
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
                <a class="treeview-item" href="Factura/factura.php"><i class="icon fa fa-circle-o"></i> Ventas</a>
            </li>
          </ul>
        </li>

        <li><a class="app-menu__item" href="logout.php">
            <i class="app-menu__icon fa-solid fa-right-from-bracket"></i>
            <span class="app-menu__label">Logout</span></a>
        </li>
      </ul>
    </aside>


    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Cotton & Co Sweaters - Tienda Virtual</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>     
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="usuario icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Usuarios</h4>
              <p>
                <b>
                <?php
                  $sql = "SELECT * FROM usuario";
                  if($result=mysqli_query($DB, $sql)){
                      $count = mysqli_num_rows($result);
                      echo $count;
                  }
                ?>
                </b>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Pedidos</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon btn-admin"><i class="administrador icon fa-solid fa-user-tie"></i>
            <div class="info">
              <h4>Admins</h4>
              <p>
                <b>
                <?php
                  $sql = "SELECT * FROM administrador";
                  if($result=mysqli_query($DB, $sql)){
                      $count = mysqli_num_rows($result);
                      echo $count;
                  }
                ?>
                </b>
              </p>
            </div>
          </div>
        </div> 
      </div>
      <div class="row">
        <!-- Grafica de Uusario -->
        <div class="col-md-6" id="piechart" class="embed-responsive embed-responsive-16by9" style="width: 900px; height: 500px;"></div>
        <!-- Grafica de Ventas -->
        <div class="col-md-6" id="top_x_div" class="embed-responsive embed-responsive-16by9" style="width: 900px; height: 500px;"></div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Diagramas-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }

      let ajustes = document.getElementById('ajustes');
      ajustes.addEventListener('click',function(e){
        Swal.fire({
          title: 'Venta #123465',
          text: '¿Eliminar?',
          icon: 'warning',
          confirmButtonText: 'Sí, eliminar',
        }).then(resultado => {
          if (resultado.value) {

          }
        });
        e.preventDefault();
      });
    </script>

    <!-- Funcion Grafica de Uusario -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
          $SQL = "SELECT U.firstName, U.surname, count(F.idUsuario) as 'Total compras' FROM usuario U 
          INNER JOIN factura F on F.idUsuario=U.idUsuario GROUP BY U.firstName;";
          //$SQL = "SELECT U.firstName, U.surname, count(F.idUsuario) as 'Total compras' FROM usuario U 
          //INNER JOIN factura F on F.idUsuario=U.idUsuario GROUP BY U.firstName ORDER BY count(F.idUsuario) DESC LIMIT 5";
          $consulta = mysqli_query($DB, $SQL);
          while ($resultado = mysqli_fetch_assoc($consulta)){
            echo "['" .$resultado['firstName']."', " .$resultado['Total compras']."],";
          }

          ?>
        ]);

        var options = {
          title: 'Compras de Usarios'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <!-- Funcion Grafica de Ventas -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Producto', 'Cantidad'],
        <?php
        $SQL = "SELECT P.nameProducto, count(D.codigo) as 'Total compras' FROM producto P 
        INNER JOIN detallefactura D on D.codigo=p.codigo GROUP BY p.codigo;";
        //$SQL = "SELECT P.nameProducto, count(D.codigo) as 'Total compras' FROM producto P 
        //INNER JOIN detallefactura D on D.codigo=P.codigo GROUP BY P.nameProducto ORDER BY count(D.codigo) DESC LIMIT 8";
        $consulta = mysqli_query($DB, $SQL);
        while ($resultado = mysqli_fetch_assoc($consulta)){
          echo "['" .$resultado['nameProducto']."', " .$resultado['Total compras']."],";
        }
        ?>
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 780,
          legend: { position: 'none' },
          chart: { title: 'Producto mas Vendido' },
          bars: 'horizontal', 
          axes: {
            x: {
              0: { side: 'top', label: 'Ventas'} 
            }
          },
          bar: { groupWidth: "100%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </body>
</html>
