<?php session_start();
include "../Seguridad/seguridadModulos.php";
seguridadDelegado(true);?>
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
                <li ><a href="pedido.php">Realizar Pedido</a></li>
                <li class="current"><a href="estadoPedidos.php">Estado de Pedidos</a></li>
                <li><a href="../Login/logout.php">Salir</a></li>
              </ul>
            </nav>
        </header>
      </div>


      <!-- Contenido -->
      <div id="features-wrapper">
          <div class="container">
              <div class="bs-example" data-example-id="striped-table">
              <center>
                <?php //Buscando el nnombre del Centro
$id_centro = $_SESSION["ID_CENTRO"];
$sql       = "SELECT NOMBRE_CENTRO FROM CENTRO WHERE ID_CENTRO='$id_centro'";
$data      = mysqli_query(enviaconex(), $sql) or die(mysql_error());
while ($info = mysqli_fetch_array($data)) {
    $NOMBRE_CENTRO = $info['NOMBRE_CENTRO'];
}
?>
                <h1>Estado de Pedidos</h1> <p class="text-warning">Centro Perteneciente</p><p class="bg-primary"><?echo $NOMBRE_CENTRO; ?></p>
              </center>
              <div class="table-responsive">
              <table class="table table-striped table-condensed table-hover" align="center" style="text-align: left;">
                      <thead>
                        <tr>
                          <th><b>Fecha del Pedido</b></th>
                          <th><b>Estado del Pedido</b></th>
                          <th><b>Observaciones</b></th>
                          <th><b>Más Detalles</b></th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php

$cont = 0;
$sql  = "SELECT * FROM PEDIDO WHERE ID_CENTRO='$id_centro' ORDER BY FECHA DESC  ";
$data = mysqli_query(enviaconex(), $sql) or die(mysql_error());
while ($info = mysqli_fetch_array($data)) {
    $cont += 1;
    //ID_PEDIDO
    $idPedido = $info['ID_PEDIDO'];
    //fecha
    $fecha = $info['FECHA'];
    //estado
    $estado = $info['ESTADO'];
    //Observaciones
    $observacion = utf8_encode($info['DESCRIPCION']);
    echo "<tr>";
    echo "<td>$fecha</td>";
    echo "<td>$estado</td>";
    echo "<td>$observacion</td>";
    if (strcmp($info['TIPO_PEDIDO'], "EXTRAORDINARIA") !== 0) {

        ?>
                              <td>
                              <button id="binfo<?echo "$cont"; ?>" class="btn btn-info" onclick="realizaProceso('<?echo $idPedido; ?>','info<?echo "$cont"; ?>','ocultar<?echo "$cont"; ?>'); return false;">Detalles del Pedido</button>
                              <button id="ocultar<?echo "$cont"; ?>" style="display: none" class="btn btn-primary" onclick="ocultar('info<?echo "$cont"; ?>','ocultar<?echo "$cont"; ?>'); return false;">Ocultar Detalles</button>

                              <div id="info<?echo $cont; ?>" class="panel-collapse collapse" style="display: none" >

                              </div>
                              </td>
                                <?
    } else {
        echo "<td>Pedido ExtraOrdinario</td>";
    }

}
?>
                  </tbody>
          </table>
           <hr>
</div>
        </div>

            </div>
          </div>
        </div>


              <?php include 'modeloPagina/final.php';
?>

      </div>


      <script>
      function ocultar(idinfo,ocultar){
         document.getElementById(idinfo).style.display="none";
         $("#b"+idinfo).attr("disabled",false);
         document.getElementById(ocultar).style.display="none";
    document.getElementById("b"+idinfo).style.display="block";
      }
      function realizaProceso(pedido,idinfo,ocultar){
              var parametros = {
                "idPedido":pedido
              };
              $.ajax({
                      data:  parametros,
                      url:   'detallePedidos.php',
                      type:  'post',
                      beforeSend: function () {
     document.getElementById("b"+idinfo).style.display="none";
                      },
                      success:  function (response) {
                          $("#"+idinfo).html(response);
                           document.getElementById(idinfo).style.display="block";
                           $("#b"+idinfo).attr("disabled",true);
                           document.getElementById(ocultar).style.display="inline-block";
                      }
              });
      }
      </script>
  </body>
</html>
