<?php session_start(); ?>
<?php
include("../Seguridad/seguridadModulos.php");
  seguridadDelegado(true); ?>
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
                <li class="current"><a href="user.php" >Productos y Kits</a></li>
                <li ><a href="pedido.php">Realizar Pedido</a></li>
                <li ><a href="estadoPedidos.php">Estado de Pedidos</a></li>
                <li><a href="../Login/logout.php">Salir</a></li>
              </ul>
            </nav>
        </header>
      </div>

			<!-- Contenido -->
				<div id="features-wrapper">
					<div class="container">
						<div class="row">
							<div class="4u 12u(medium)">
								<!-- Caja Grid -->
									<form  action="" method="post" name="formulario1">
									<section class="box feature">
										<div class="inner" style="height: 580px;">
											<h2 style="color:#444">Seleccione Categorias</h2>

											<div class="fleft">
                        <select  class="form-control" name="opcion">
                          <?php
                          $sql="SELECT ID_CATEGORIA, CATEGORIA FROM CATEGORIA";
                          	$check = mysqli_query(enviaconex(), $sql)or die(mysql_error());
                            while($info=mysqli_fetch_array($check)){
                              echo "<option value='".$info["ID_CATEGORIA"]."' >".$info["CATEGORIA"]."</option>";
                            }
                           ?>
                        <option value="0" selected >Busca Todas</option>
                      </select>
											</div>
										</div>
                    <a href="javascript:enviar_formulario()"  class="btn btn-success" role="button">Buscar</a>
								 </form>
									</section>
                  <script>
                  function enviar_formulario(){
                    document.formulario1.submit()
                  }
                  </script>

							<!-- Caja Grid -->
							<section class="box2 feature">

								<div class="inner">


                  <?php


  									$select= $_SESSION["opcion"];

  									if (isset($_POST['opcion'])){
  									$select=$_POST['opcion'];
                    $_SESSION["opcion"]=$select;
  								}
  									if(empty($select)){
                      $sql = "SELECT PRODUCTO.DESCRIPCION,CENTRO.ID_CENTRO, CENTRO.NOMBRE_CENTRO, PRODUCTO.COD_PRODUCTO, PRODUCTO.ID_CATEGORIA, PRODUCTO.NOMBRE_PRODUCTO, PRODUCTO_CENTRO.CANTIDAD_PRODUCTO_CENTRO \n"
    . "FROM PRODUCTO, PRODUCTO_CENTRO, CENTRO, CATEGORIA\n"
    . "WHERE\n"
    . " PRODUCTO.COD_PRODUCTO=PRODUCTO_CENTRO.COD_PRODUCTO AND\n"
    . "PRODUCTO_CENTRO.ID_CENTRO=CENTRO.ID_CENTRO AND\n"
    . "PRODUCTO.ID_CATEGORIA=CATEGORIA.ID_CATEGORIA ORDER BY COD_PRODUCTO ASC\n ";

  									$check = mysqli_query(enviaconex(), $sql)or die(mysql_error());

  								}else{
                  $sql = "SELECT PRODUCTO.DESCRIPCION,CENTRO.ID_CENTRO,CENTRO.NOMBRE_CENTRO, PRODUCTO.COD_PRODUCTO, PRODUCTO.ID_CATEGORIA, PRODUCTO.NOMBRE_PRODUCTO, PRODUCTO_CENTRO.CANTIDAD_PRODUCTO_CENTRO \n"
    . "FROM PRODUCTO, PRODUCTO_CENTRO, CENTRO, CATEGORIA\n"
    . " WHERE\n"
    . " PRODUCTO.COD_PRODUCTO=PRODUCTO_CENTRO.COD_PRODUCTO AND\n"
    . " PRODUCTO_CENTRO.ID_CENTRO=CENTRO.ID_CENTRO AND\n"
    . " PRODUCTO.ID_CATEGORIA=CATEGORIA.ID_CATEGORIA AND\n"
    . " CATEGORIA.ID_CATEGORIA=\"$select\" ORDER BY COD_PRODUCTO ASC";
  											$check = mysqli_query(enviaconex(), $sql)or die(mysql_error());

  								}
  									$cont=0;

  									while($extProd = mysqli_fetch_array( $check )){
  										$cont++;
                      echo "<div class='row-prod'>";
                        echo "	<div class='col-sm-6 col-md-4'>";


  										echo "<center><h3 style='color:#444;'>".utf8_encode(strtoupper($extProd['NOMBRE_PRODUCTO']))."</h3></center>";
                      echo "<center><h3 style='color:#444; font-size: 10px; '><b>Centro: </b>".utf8_encode($extProd['NOMBRE_CENTRO'])."</h3></center>";
                      echo "<input name='centro' id='centro$cont' type='hidden' value='".utf8_encode($extProd['NOMBRE_CENTRO'])."'> ";
                      echo "<center><h3 style='color:#444; font-size: 10px; '><b>Descripción: </b>".utf8_encode($extProd['DESCRIPCION'])."</h3></center>";
                      echo "<input name='descripcion' id='descripcion$cont' type='hidden' value='".utf8_encode($extProd['DESCRIPCION'])."'> ";
  										echo "<input name='producto' id='producto$cont' type='hidden' value='".utf8_encode($extProd['NOMBRE_PRODUCTO'])."'> ";
                      echo "<input name='cod_producto' id='cod_producto$cont' type='hidden' value='".$extProd['COD_PRODUCTO']."'> ";
                      echo "<input name='id_centro' id='id_centro$cont' type='hidden' value='".$extProd['ID_CENTRO']."'> ";
                      echo "<div class='thumbnail'>";
                      $imagen=utf8_encode(strtolower($extProd['NOMBRE_PRODUCTO']));
                      $rimagen = str_replace(" ", "", $imagen);
                      $rimagen = str_replace("Ñ", "ñ", $rimagen);
                      $rimagen = str_replace("Ú", "ú", $rimagen);
                      $rimagen = str_replace("Ó", "ó", $rimagen);
  										echo "<img src='../../iconos/$rimagen.png' width='60%' height='60%' alt='...' />";
                      ?>
                       <div id="mensaje<?echo $cont;?>"  style="display: none"></div>
                      <?php
  										echo "<div class='progress'>";
  										echo "<div class='progress-bar' role='progressbar' id='pro$cont' aria-valuenow='50' aria-valuemin='0' aria-valuemax=".$extProd['CANTIDAD_PRODUCTO_CENTRO']." style='width: 100%;'>";
  										echo "".$extProd['CANTIDAD_PRODUCTO_CENTRO']."  </div></div>	<div class='form-style-1'>";
  										echo "<label style='color:#444; font-size: 1em;' for='cantidad'>Cantidad</label>";
  										echo "<input name='cantidad' id='cantidad$cont' style='width: 50%; color:#444;' type='number' id='cantidad' min='0' max='999' step='1' maxlength='3'/>";
                      ?>
                      <a href="javascript:;" class="btn btn-success" role="button"  id="Pedir<?echo $cont;?>" onclick="realizaProceso($('#cantidad<?echo $cont;?>').val(), $('#centro<?echo $cont;?>').val(), $('#descripcion<?echo $cont;?>').val(), $('#producto<?echo $cont;?>').val(), $('#cod_producto<?echo $cont;?>').val(), $('#id_centro<?echo $cont;?>').val(), 'Pedir<?echo $cont;?>','mensaje<?echo $cont;?>');return false;" >Pedir</a>	</div>	</div></div></div>

                      <?php
                    	//echo "<input type='button' href='javascript:;' onclick='realizaProceso($('#cantidad').val(),$('#centro').val(), $('#descripcion').val(),$('#producto').val(),$('#cod_producto').val(),$('#id_centro').val()); return false;'  class='btn btn-success' role='button' value='Pedir' />	</div>	</div>	</div>	</div>";

  									}

  									 ?>

								</div>
							</section>

						</div>
					</div>
				</div>
			</div>



      <?php include 'modeloPagina/final.php';
       ?>
    <script>
      function realizaProceso(cantidad,valorCaja1, valorCaja2, valorCaja3, valorCaja4,valorCaja5,pedir,mensaje){
              var parametros = {
                "cantidad":cantidad,
                      "centro" : valorCaja1,
                      "descripcion" : valorCaja2,
                      "producto" : valorCaja3,
                      "cod_producto" : valorCaja4,
                      "id_centro" : valorCaja5

              };
              $.ajax({
                      data:  parametros,
                      url:   'pedirProductos.php',
                      type:  'post',
                      beforeSend: function () {
                        document.getElementById(mensaje).style.display="block";
                        document.getElementById(pedir).innerHTML="Pidiendo...";
                        //document.getElementById("cantidadcarrito").innerHTML="<?$a=$_SESSION['cont']; echo "<h1>$a</h1>";?>";
                       $("#"+pedir).attr("disabled",true);
                      },
                      success:  function (response) {


                        //$("#cantidadcarrito").html(<?$a=$_SESSION['cont']; echo "<h1>$a</h1>";?>);
                          $("#"+mensaje).html(response);
                          document.getElementById(pedir).innerHTML="Pedir";
                         $("#"+pedir).attr("disabled",false);
                         window.setTimeout(empezar, 4000);
                         function empezar(){
                           document.getElementById(mensaje).style.display="none";
                         }
                      }
              });
      }
      </script>
    <script type="text/javascript">

			$( function() {

				$( '#cd-dropdown' ).dropdown( {
					gutter : 5,
					stack : true,
					delay : 100,
					slidingIn : 100
				} );

			});

		</script>
    <!-- Script validacion de input -->
      <script>
      $(document).ready(function() {
          $('#integerForm').formValidation();
      });
      </script>

		<script>

function enviar_formulario(){
   document.formulario1.submit()
}
</script>
	</body>
</html>
