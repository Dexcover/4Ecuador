

<html>
    <head>
        <title>ECUADOR</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <?
      include('modeloPagina/head.php');
      ?>
    </head>
    <body>

<?php
include "php/conexion.php";

$user_id = null;
$sql1 = "select * from CENTRO where ID_CENTRO = " . $_GET["id"];

$query = $con->query($sql1);

$centro = null;

if ($query->num_rows > 0) {
    while ($r = $query->fetch_object()) {
        $centro = $r;
        break;
    }
}
?>

<?php if ($centro != null): ?>

    <form role="form" method="post" action="php/php_centro/actualizar.php" align="center">

        <div class="form-group" style="display:none;">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control" value="<?php echo $centro->ID_CENTRO; ?>" name="codigo" required>
        </div>
      <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $centro->NOMBRE_CENTRO; ?>" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" value="<?php echo $centro->DIRECCION_CENTRO; ?>" name="direccion" required>
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" class="form-control" value="<?php echo $centro->CIUDAD_CENTRO; ?>" name="ciudad" required >
        </div>
        <div class="form-group">
            <label for="provincia">Provinia</label>
            <input type="text" class="form-control" value="<?php echo $centro->PROVINCIA_CENTRO; ?>" name="provincia" required >
        </div>
        
        <input type="hidden" name="id" value="<?php echo $centro->ID_CENTRO; ?>">
        <button type="submit" class="btn btn-default">Actualizar</button>
    
    </form>

<?php else: ?>
    <p class="alert alert-danger">404 No se encuentra</p>
<?php endif; ?>

 </body>
</html>
