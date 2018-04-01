<?php session_start();
include("../Seguridad/seguridadModulos.php");
 seguridadAyudante();
	 ?>
<html>
    <head>
      <?
      include('modeloPagina/head.php');
      ?>
    </head>
    <body>
        <?php include "php/php_kit/navbar.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>CREACION KIT</h2>

                    <?php include "php/php_kit/tabla.php"; ?>
                </div>
            </div>
        </div>

    </body>
</html>
