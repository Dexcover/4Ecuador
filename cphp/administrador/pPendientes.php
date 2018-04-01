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
		<link rel="stylesheet" type="text/css" href="../../assets/css/style6.css" />
		<script src="../../assets/js/modernizr.custom.63321.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script>
function enviar(){
  if(confirm('Estas a punto de enviar un Pedido al Centro!')){ return true;}else{return false;}
}

function realizarEx(pedido,dinfo){

if(confirm("Estas seguro de confirmar recibimiento de solicitud de un pedido!")){
  var parametros = {
    "idPedido":pedido
  };

  $.ajax({
          data:  parametros,
          url:   'aceptarPedidoEx.php',
          type:  'post',
          beforeSend: function () {


             //$("#b"+idinfo).attr("disabled",false);
          },
          success:  function () {
            alert("Petición Extraordinaria Recibida correctamente");

             location.reload();
          }
  });


}

}


  function ocultar(idinfo,ocultar,ob){
     document.getElementById(idinfo).style.display="none";
     $("#b"+idinfo).attr("disabled",false);
     document.getElementById(ocultar).style.display="none";
      document.getElementById("b"+idinfo).style.display="block";
      $("#"+ob).attr("disabled",true);

  }
    function realizaProceso(pedido,idinfo,ocultar, ob){

            var parametros = {
              "idPedido":pedido
            };
            $.ajax({
                    data:  parametros,
                    url:   'detallePedidoAdmin.php',
                    type:  'post',
                    beforeSend: function () {
                       document.getElementById("b"+idinfo).style.display="none";

                    },
                    success:  function (response) {

                        $("#"+idinfo).html(response);
                         document.getElementById(idinfo).style.display="block";

                         $("#b"+idinfo).attr("disabled",true);
                         $("#"+ob).attr("disabled",false);
                          //document.getElementById("#b"+idinfo).style.display="inline-none";
                         document.getElementById(ocultar).style.display="inline-block";
                    }
            });
    }


    </script>
	</head>
	<body class="homepage" onload="setInterval('location.reload()',100000)">
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

				                  <li ><a href="admincontrol.php">Inicio</a></li>

				                <?php
                        $sql="SELECT COUNT(*) AS NUMEROPEN FROM PEDIDO WHERE ESTADO='PENDIENTE'";
                        $data=mysqli_query(enviaconex(),$sql)or die(mysql_error());
                        while ($info = mysqli_fetch_array($data)) {
                          $numeropen=$info['NUMEROPEN'];
                        }
				                              echo "<li class='current' ><a href='pPendientes.php'>Peticiones Pendientes($numeropen)</a></li>";
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
			<div id="features-wrapper">
				<div class="container">
					<div class="bs-example" data-example-id="striped-table">
							<h1 style="text-align: center;">Pedidos Ordinarios</h1>
							<hr>
						<div class="table-responsive">
							<table class="table table-striped" align="center" style="text-align: left;">
								<thead>
									<tr>
                    <th><b>Fecha del Pedido</b></th>
                    <th><b>Centro</b></th>
                    <th><b>Estado del Pedido</b></th>
                    <th><b>Observaciones</b></th>
                    <th><b>Opciones</b></th>
									</tr>
								</thead>
								<tbody>
                  <?php
                  include('mostrarPedidoOr.php');
                  mostrar("PENDIENTE");
                 ?>
							</tbody>
						</table>
						<hr>
					</div>
				</div>
				<div class="bs-example" data-example-id="striped-table">
					<center>
						<h1 style="text-align: center;">Pedidos Extraordinarios</h1>
					</center>
					<div class="table-responsive">
					<table class="table table-striped" align="center" style="text-align: left;">
							<thead>
								<tr>
									<th><b>#</b></th>
									<th><b>ID_Pedido</b></th>
									<th><b>Centro Pedido</b></th>
									<th><b>Fecha</b></th>
									<th ><b>Detalle</b></th>
									<th WIDTH="100"><b>Prioridad</b></th>

                    	<th><b>Informar</b></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<?php
              include('mostrarPedidoEx.php');
              mostrarex("PENDIENTE");
						?>

					</table>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>

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
			<script src="../../assets/js/main.js"></script>



	</body>
</html>
