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
                                <h4 class="page-title">Panel de control</h4>
                                <p class="text-muted page-title-alt">Welcome to Ubold admin panel !</p>
                            </div>
                        </div>
                        <?php 
						
						include('connect.php');
						$query="SELECT * FROM eventos WHERE id_coord='$id'";
						$link=mysql_connect($server,$dbuser,$dbpass);
						$result=mysql_db_query($database,$query,$link);
						while($row = mysql_fetch_array($result))
						{
							 echo '<div class="row">';
                        
                           echo '<div class="col-md-6 col-lg-3">';
                               echo ' <div class="widget-bg-color-icon card-box fadeInDown animated">';
                                   /* <!--<div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>-->*/
                                  echo ' <div class="text-right">';
                                        echo '<h3 class="text-dark"><b class="counter">Nombre de evento</b></h3>';
                                       echo ' <p class="text-muted">'.$row['reservaciones'].' Reservaciones</p>';
                                       echo '  <p class="text-muted">70 Pagados</p>';
                                       echo ' <p class="text-muted">30 Adeudos</p>';
                                   echo '</div>';
                                    echo '<div class="clearfix"><a href="clientes.php?id='.$row['id_evento'].'">ver detalles</a></div>';
                               echo ' </div></div>';
							
						}

                     // mysql_close($sql);
							
							?>
                          
                         <!---->

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