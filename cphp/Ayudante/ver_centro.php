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
        <?php include "php/php_centro/navbar.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>VER CENTROS</h2>
                    <!-- Button trigger modal -->
                    <a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar Centro</a>
                    <br><br>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Agregar</h4>
                                </div>
                                <div class="modal-body" align="center">

                                    <form role="form" method="post" action="php/php_centro/agregar.php" align="center">


                                        <div class="form-group" style="display:none;">
                                            <label for="codigo">Codigo</label>
                                            <input type="text" class="form-control" name="codigo" value="" >
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" required>
                                        </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <input type="text" class="form-control" name="direccion" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad</label>
                                            <input type="text" class="form-control" name="ciudad" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="provincia">Provincia</label>
                                            <input type="text" class="form-control" name="provincia" required>
                                        </div>

                                        <button type="submit" class="btn btn-default" >Agregar</button>
                                    </form>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <?php include "php/php_centro/tabla.php"; ?>
                </div>
            </div>
        </div>

    </body>
</html>
