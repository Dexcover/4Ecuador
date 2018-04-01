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
                    <h2>KITS DISPONIBLES</h2>



<?php
include ("../conexion/conectar.php");

$user_id = null;
$sql1 = "select * from PRODUCTO ORDER BY NOMBRE_PRODUCTO;";
$query = $con->query($sql1);
?>

<?php if ($query->num_rows > 0): ?>

    <form name="formulario" role="form" method="post" action="php/php_centro/tabla_disponibles.php">

        <h3>Seleccione el Centro:</h3>

        <select  class="form-control" name="centro" required>

                                                <?php


                                                $sql2 = "select * from CENTRO";
                                                $query1 = $con->query($sql2);

                                                while ($r = $query1->fetch_object()) {
                                                    echo " <option value='" . $r->ID_CENTRO . "'> " . $r->NOMBRE_CENTRO . " </option> ";
                                                }
                                                ?>
                                            </select>
          <button type="submit" class="btn btn-default">VER</button>


        <br><br>

        <table class="table table-bordered table-hover">
            <thead>
            <th>KIT</th>

            </thead>

            <?php while ($r = $query->fetch_array()): ?>
                <tr>

                <td>
                <input type="radio" class="radio-inline" name="kit" id="kit" value="<?php echo $r["COD_KIT"]; ?>" >&nbsp;&nbsp;&nbsp; <?php echo $r["NOMBRE_KIT"]; ?>
                </td>
                </tr>
            <?php endwhile; ?>


        </table>


    </form>


<?php else: ?>
    <p class="alert alert-warning">No hay resultados</p>
<?php endif; ?>




                </div>
            </div>
        </div>

    </body>
</html>
