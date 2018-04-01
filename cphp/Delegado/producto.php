<?php session_start(); ?>
<?php
include("../Seguridad/seguridadModulos.php");
  seguridadDelegado(true); ?>
<!DOCTYPE HTML>
<html>
<?php include 'modeloPagina/head.php';
 ?>
<body class="homepage">
  <div class="modalMsgWrapper" >
    <div id="container">
      <div id="header">
        <div class="wrap cf" style="position:relative;">
          <h2 class="logo cf"><a href="/../../">4Ecuador</a></h2>
           <div id="logged_in_info" class="">
            <div id="notloggedin_wrapper" class="show">
              <div id="notloggedin" class="prelogin">
                <ul id="login_signup">
                <li id="loginTabWrap" class="gbtnTertiary rightBtn"><div  onClick="location.href='../../cphp/Delegado/tipo.php'" id="headerlogin_tab"> Menu</div></li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <header>
    <div class="page-header">
    <center>
    <h1>PRODUCTO EXTRAORDINARIO</h1>
   </center>
 </div>
  </header>

<div id="features-wrapper" >
          <div class="container"style="width: 50%">
            <div class="row">
              <div class="4u 12u(medium)">

                <!-- Caja Grid -->
                 <section>
                    <div class="formu-extra">
                      <form method="post" onsubmit="gracias(); "action="registraExtraordinario.php">
                      <div class="form-group">
                        <label for="nombreProducto">Nombre Producto</label>
                        <input name="producto" type="text" class="form-control" id="nombreProducto" maxlength="20" placeholder="El nombre del producto debe ser puntual solo se admiten 20 caracteres" required="true">
                      </div>
                      <div class="form-group">
                        <label for="descripcionProducto">Descripción Producto</label>
                        <textarea name="desProducto" type="text" class="form-control" id="descripcionProducto" placeholder="Por favor ingresar una descripción clara de producto, si lo necesita por cantidates o paquetes o peso" rows="3" required="true"></textarea>
                      </div>
                      <!--<div class="form-group">
                        <label for="pesoProducto">Peso</label>
                        <input name="pesoCantidad" type="text" class="form-control" id="pesoProducto" placeholder="Colocar la inicial de la unidad de medida (lb,kg,t,etc...)">
                      </div>-->
                      <div class="form-group">
                        <label for="cantidadProducto">Cantidad</label>
                        <input name="cantidad" type="number" class="form-control" id="cantidadProducto"  min='0' max='999' step='1' maxlength='3' placeholder="" required="true">
                      </div>
                      <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select style='color:black; font-size: 14px' id="categoria"  name="categoria" required="true">
                          <option value="-1"  selected>Escoja la categoria</option>
                        <?php
                        $sql="SELECT ID_CATEGORIA, CATEGORIA FROM CATEGORIA";
                          $check = mysqli_query(enviaconex(), $sql)or die(mysql_error());
                          while($info=mysqli_fetch_array($check)){
                            echo "<option style='color:black' value='".$info["ID_CATEGORIA"]."' >".$info["CATEGORIA"]."</option>";
                          }
                         ?>


                        </select>
                      </div>
                      <!--<div class="form-group">
                      <label for="importanciaProducto">Importancia</label>
                        <select class="form-control" id="importanciaProducto">
                          <option>Seleccione</option>
                          <option>Baja</option>
                          <option>Media</option>
                          <option>Alta</option>
                        </select>
                      </div>-->
                      <button type="submit" class="btn btn-success"  style="width: 30%; height: 40px;">Solicitar</button>
                    </form>
                    </div>
                  </section>

              </div>

            </div>
          </div>
        </div>

  <aside>

  </aside>

  <!-- Footer -->
        <div id="footer-wrapper">
          <footer id="footer" class="container">
            <div class="row">
              <div class="12u">
                <div id="copyright">
                  <ul class="menu">
                    <li>Integrantes</li><li>Estudiantes: UPS</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>

      </div>

    <!-- Scripts -->

      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>

  <script type="text/javascript" src="lib/alertify.js"></script>


  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
  function gracias() {
    alert("Petición Enviada correctamente")
  }
  </script>
</body>
</html>
