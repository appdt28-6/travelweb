<?php session_start();?>

<?php
if(!isset($_SESSION['inicia'])){
header("location: index.html?**sin-acceso**");
} else { 
$e=$_SESSION['inicia'];
$id=$_GET['id'];
} /* Y cerramos el else */ 

?>

<!DOCTYPE html>
<html>
	<head>
		<?php include('head.php'); ?>
	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="panel.php?id=<?php echo $id; ?>" class="logo"><i class="icon-magnet icon-c-logo"></i><span>App<i class="md md-album"></i>DT</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <?php include('perfil.php');?>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
			<?php include('menu.php');?>
			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
					<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title">Mis clientes</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Nombre del evento</a>
									</li>
									
								</ol
							></div>
						</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Edad</th>
                                                    <th>Celular</th>
                                                    <th>Email</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        include ('connect.php');
                                  $query = "SELECT * FROM Clientes";
                                  $result = mysql_query($query);
                                  while($row = mysql_fetch_array($result))
                                  {
                                   echo "<tr>";
                                            echo "<td>".$row['nombre']." ".$row['ap']." ".$row['am']."</td>";
											 echo "<td>".$row['edad']."</td>";
                                            echo "<td>".$row['cel']."</td>";
                                            echo "<td>".$row['email']."</td>";
											 echo "<td>".$row['estado']."</td>";
                                          echo '<td width=250>';
											echo '<a class="btn btn-success" href="perfil.php?id='.$row['id_cliente'].'">Perfil</a>';
											echo '&nbsp;';
											echo '<a class="btn btn-danger" href="delete.php?id='.$row['id_cliente'].'">Pagos</a>';
											echo '</td>';
                                        echo "</tr>";
                                  }
                                        mysql_free_result($result);
                                    mysql_close($link);

                                        ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>


                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    2016 © AppDT.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
    
        <script>
            var resizefunc = [];
        </script>

       <?php include('js.php'); ?>
	</body>
</html>