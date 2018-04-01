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
        <?php include "php/php_producto/navbar.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>VER PRODUCTOS</h2>
                    <!-- Button trigger modal -->
                    <a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar Producto</a>
                    <br><br>



                    <!-- Modal agregar -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Agregar</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="php/php_producto/agregar.php">
                                        <div class="form-group" style="display:none;">
                                            <label for="codigo">Codigo</label>
                                            <input type="text" class="form-control" name="codigo" value="" >
                                        </div>
                                        <div class="form-group">
                                            <label for="categoria">Categoria</label>

                                            <select  class="form-control" name="categoria" required>
                                                <?php
                                                include "php/conexion.php";

                                                $sql2 = "select * from CATEGORIA";
                                                $query1 = $con->query($sql2);

                                                while ($r = $query1->fetch_object()) {
                                                    echo " <option value='" . $r->ID_CATEGORIA . "'> " . $r->CATEGORIA . " </option> ";
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input type="text" class="form-control" name="descripcion" required>
                                        </div>


                                        <button type="submit" class="btn btn-default">Agregar</button>
                                    </form>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <?php include "php/php_producto/tabla.php"; ?>
                </div>
            </div>
        </div>

    </body>
</html>
