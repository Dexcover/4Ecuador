<?php
include "php/conexion.php";

$user_id = null;
$sql1 = "select * from KIT where COD_KIT = " . $_GET["id"];

$query = $con->query($sql1);
$nombre_kit = null;



if ($query->num_rows > 0) {
    while ($r = $query->fetch_object()) {
        $kit = $r;
        break;
    }
}
?>

<?php if ($kit != null): ?>

    <form role="form" method="post" action="php/php_kit/actualizar.php">
        <div class="form-group" style="display:none;">
            <label for="codigo">cod Categoría</label>
            <input type="text" class="form-control" value="<?php echo $nombre_kit->nombre_kit; ?>" name="codigo" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <!--<input type="text" class="form-control" value="<?php //echo $producto->ID_CATEGORIA;  ?>" name="categoria" required>-->



        </div>
        <div class="form-group">
            <label for="categoria">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $nombre_kit->nombre_kit; ?>" name="categoria" required>
        </div>
        
        <input type="hidden" name="id" value="<?php echo $nombre_kit->cod_kit; ?>">
        <button type="submit" class="btn btn-default">Actualizar</button>
    </form>
<?php else: ?>
    <p class="alert alert-danger">404 No se encuentra</p>
<?php endif; ?>