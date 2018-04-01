<?php session_start(); ?>
<?php  if (isset($_SESSION["estado"])){
    if(strcasecmp($_SESSION["TIPO_USUARIO"],"Administrador")==0){
      header("Location: ../../cphp/administrador/admincontrol.php");
    }
    if(strcasecmp($_SESSION["TIPO_USUARIO"],"DELEGADO")==0){
      header("Location: ../../cphp/Delegado/tipo.php");
    }
    if(strcasecmp($_SESSION["TIPO_USUARIO"],"AYUDANTE")==0){
      header("Location: ../../inventario.php");
    }
}else{
  include("login.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Acceso al sistema -  4Ecuador</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
		      <link rel="stylesheet" href="../../css/form-elements.css">
          <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../assets/css/main.css" />

    </head>

    <body>

      <!-- livezilla.net code --><script type="text/javascript" id="6a7ce1a16627ae3304dc34a6b16da8e6" src="http://4ecuador.infodesarrollo.ec/livezilla/script.php?id=6a7ce1a16627ae3304dc34a6b16da8e6"></script><!-- http://www.livezilla.net -->

                   
    
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div align="center"><img src="../../images/logo.png"/ width="50%">
                    </br>
                     <center>
                      <p>Nuestro Sistema tiene 3 accesos </br><span><b>Administrador</b> de las peticiones</span>, </br><span><b>Delegado</b> de las peticiones</span>, </br><span><b>Ayudante</b> de inventario</span></br>
                      <span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Acceda a nuestro sistema para una <em><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Evaluación</em> ó <em><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Presentación</em></br> <b><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Usa el chat Online, ó <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> dejanos un mensaje</b>
                      </br> 
                      <span class=" glyphicon glyphicon-home" aria-hidden="true"></span> <a href="../../../">Regresar Página Principal</a>
                      </p>
                      </center>
                    </div>
             

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">

                                <?php

                                if (isset($_POST['submit'])) {
                                  $irpagina=validarUsuario();
                                  if(strcasecmp($irpagina,"Administrador")==0){
                                    echo "<font style='color: #001f3f; font-size: 16px'>Sus Datos fueron correctamente Autentificados, porfavor ingrese al sistema.!</font><a href='../../cphp/administrador/admincontrol.php'> Acceder al Sistema</a>";
                                  }elseif(strcasecmp($irpagina,"false")!=0){
					                               echo "<font style='color: #001f3f; font-size: 16px'>Sus Datos fueron correctamente Autentificados, porfavor ingrese al sistema.!</font><a href='$irpagina'> Acceder al Sistema</a>";
					                                  }else{
                                                echo "<p>Ingrese nuevamente su  usuario y clave proporcionados</p>";
				                    echo "<font style='color: red'>Datos Incorrectos, verifíque sus credenciales.</font>";
                            ?>
                          </div>
                          <div class="form-top-right">
                          <i class="fa fa-key"/></i>
                          </div>
                          </div>
                          <div class="form-bottom">
                          <form role="form" action="" method="post" class="login-form">
                          <div class="form-group">
                          <label class="sr-only" for="form-username">Cedula:</label>
                          <input  type="text" name="form-username" placeholder="Cedula..." class="form-username form-control" id="form-username" maxlength="10"  autofocus />
                          </div>
                          <div class="form-group">
                          <label class="sr-only" for="form-password">Clave</label>
                          <input type="password" name="form-password" placeholder="Clave..." class="form-password form-control" />
                          </div>

                          <button type="submit" name="submit" class="btn">Autentificar Datos</button>
                          </form>


                          </div>


                            <?php
                              }
                            }else {

                              echo "<p>Ingrese su usuario y clave:</p>";
                              ?>
                                  	</div>

                              <div class="form-top-right">
                                <i class="fa fa-key"/></i>
                              </div>
                              </div>
                              <div class="form-bottom">
                            <form role="form" action="" method="post" class="login-form">
                              <div class="form-group">
                                <label class="sr-only" for="form-username">Cedula:</label>
                                  <input type="text" name="form-username" placeholder="Cedula..." class="form-username form-control" id="form-username" maxlength="10" autofocus />
                                </div>
                                <div class="form-group">
                                  <label class="sr-only" for="form-password">Clave</label>
                                  <input type="password" name="form-password" placeholder="Clave..." class="form-password form-control" />
                                </div>

                                  <button type="submit" name="submit" class="btn">Autentificar Datos</button>
                            </form>


                          </div>
                          <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--formulario extraordinario-->


        <!-- Javascript -->
        <script src="../../js/jquery-1.11.1.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../js/jquery.backstretch.min.js"></script>
        <script src="../../js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>
</html>
<?php } ?>
