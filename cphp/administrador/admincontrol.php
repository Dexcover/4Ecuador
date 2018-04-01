<?php session_start();
include("../Seguridad/seguridadModulos.php");
 seguridadAdministrador();
	 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>4Ecuador</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="../../assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/style6.css" />
		<script src="../assets/js/modernizr.custom.63321.js"></script>

    	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
      <script src="../../bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<!-- Logo -->
							<div id="logo">
								<img src="../../images/logo.png" width="50%" height="100%" style="display: inline-block;" />

							</div>

						<!-- Nav -->
            <nav id="nav">
              <ul>

                        <li class="current"><a href="admincontrol.php">Inicio</a></li>

                      <?php
                      $sql="SELECT COUNT(*) AS NUMEROPEN FROM PEDIDO WHERE ESTADO='PENDIENTE'";
                      $data=mysqli_query(enviaconex(),$sql)or die(mysql_error());
                      while ($info = mysqli_fetch_array($data)) {
                        $numeropen=$info['NUMEROPEN'];
                      }
                                    echo "<li  ><a href='pPendientes.php'>Peticiones Pendientes($numeropen)</a></li>";
                      ?>
                      <!--  <li class="current"><a href="tipo.php">Módulos</a></li>-->
                      <?php
                      $sql="SELECT COUNT(*) AS NUMEROAPRO FROM PEDIDO WHERE ESTADO='APROBADO'";
                      $data=mysqli_query(enviaconex(),$sql)or die(mysql_error());
                      while ($info = mysqli_fetch_array($data)) {
                        $numeroapro=$info['NUMEROAPRO'];
                      }
                                    echo "<li ><a href='pAprobadas.php'>Peticiones Aprobadas($numeroapro)</a></li>";
                      ?>

                        <li><a href="../Login/logout.php">Salir</a></li>
                      </ul>
            </nav>
					</header>
				</div>


			<!-- Contenido -->
			<center>
				<div class="panel panel-primary" style="width: 50%">
				<div class="panel-heading">Administrador</div>
				<div class="panel-body">
				  <p>
				  	<h2>Bienvenidos</h2>
				  	<section>
				  		Este es el panel de administración...
				  	</section>
				  </p>
				</div>
			</div>
			</center>


			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="12u">
								<div id="copyright">
									<ul class="menu">
										<li>Integrantes</li><li>Estudiantes: <a href="#">UPS</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- Scripts -->

			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/jquery.dropotron.min.js"></script>
			<script src="../../assets/js/skel.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../../assets/js/main.js"></script>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="../../assets/js/jquery.dropdown.js"></script>

		<script>
		<?php

		 ?>
function enviar_formulario(){
   document.formulario1.submit()
}
</script>
	</body>
</html>
