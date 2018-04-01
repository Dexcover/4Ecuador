<?php include("mipedido.php");
session_start();
include("../Seguridad/seguridadModulos.php");
seguridadDelegado(false);
 ?>
<!DOCTYPE HTML>
<html>
<?php include 'modeloPagina/head.php';
 ?>
	<body class="homepage">
		<div id="page-wrapper">
      <div id="header-wrapper">
        <header id="header" class="container">
          <!-- Logo -->
            <div id="logo">
              <!--<img src="../../images/logo.png" width="50%" height="50%" style="display: inline-block;" />
            -->  <a href="pedido.php" align="right">
              </a>

            </div>

          <!-- Nav -->
            <nav id="nav">
              <ul>
                <li><a href="tipo.php">Inicio</a></li>
                <li><a href="user.php" >Productos y Kits</a></li>
                <li class="current"><a href="pedido.php">Realizar Pedido</a></li>
                <li ><a href="estadoPedidos.php">Estado de Pedidos</a></li>
                <li><a href="../Login/logout.php">Salir</a></li>
              </ul>
            </nav>
        </header>
      </div>



			<!-- Contenido -->
				<div id="features-wrapper">
					<div class="container">
						<div class="bs-example" data-example-id="striped-table">
              <form action='reservarbefore.php' method='post' name='reservar'>
							<center>
								<h1>Detalle del Pedido</h1>
							</center>
							<table class="table table-striped table-condensed table-hover" align="center" style="text-align: center;">
								<thead>
									<tr style="color: skyblue">
                    <th>#</th>

										<th><b>Producto</b></th>
										<th><b>Cantidad</b></th>
										<th style="text-align: center;"><b>Centro a Pedir</b></th>
                    <th><b>Descripción</b></th>
                    <th><b>Eliminar</b></th>
									</tr>
								</thead>
								<tbody>

                  <?php

                  $miVector=$_SESSION['miPedido'];
                  $cont=$_SESSION['cont'];
                for($i=0;$i<$cont;$i++){
                  $buscarClase = $miVector[$i];
                  echo "<tr>";

                  echo "<td>".($i+1)."</td>";
                  echo "<td>".$buscarClase->getNombreProducto()."</td>";
                  echo "<td>".$buscarClase->getCantidad()."</td>";
                  echo "<td>".$buscarClase->getCentro()."</td>";
                  echo "<td>".$buscarClase->getDescripcion()."</td>";
                  echo "<td>
                  <a href='borrarpedido.php?cod=".$buscarClase->getCodProducto()."' class='btn btn-default' role='button' ><img src='../../images/btneliminar.png' alt='' height='16px' width='16px'></a></td>";

                  echo "</tr>";

                }
                ?>
								</tbody>
							</table>
							<hr>

              <center>

									<a href="javascript:;" onclick="realizaProceso(); return false;" type="button" class="btn btn-success">Realizar Pedido</a>
</center>

						</div>
					</div>
				</div>
			</div>



      <?php include 'modeloPagina/final.php';
       ?>
			</div>

          <script>
          function realizaProceso(){

                  $.ajax({

                          url:   'reservarbefore.php',
                          beforeSend: function () {

                          },
                          success:  function (response) {
                                  $("#resultado").html(alert(response));
                                  window.location.href = "estadoPedidos.php"
                          }
                  });
          }
          </script>
	</body>
</html>
