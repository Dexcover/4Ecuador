<?php
include "../../php/conexion.php";

$user_id = null;
$sql1 = "select * from PRODUCTO where COD_PRODUCTO = " . $_GET["id"];
$sql2 = "select * from CATEGORIA";
$query = $con->query($sql1);
$query1 = $con->query($sql2);
$producto = null;

if ($query->num_rows > 0) {
    while ($r = $query->fetch_object()) {
        $producto = $r;
        break;
    }
}
?>

<?php if ($producto != null): ?>

    <form role="form" method="post" action="actualizar.php">
        <div class="form-group" style="display:none;">
            <label for="codigo">Codigo</label>
            <input type="text" class="form-control" value="<?php echo $producto->COD_PRODUCTO; ?>" name="codigo" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <!--<input type="text" class="form-control" value="<?php //echo $producto->ID_CATEGORIA;  ?>" name="categoria" required>-->



            <select  class="form-control" name="categoria" required>
                <?php
                while ($r = $query1->fetch_object()) {
                    echo " <option value='" . $r->ID_CATEGORIA . "'> " . $r->CATEGORIA . " </option> ";
                }
                ?>
            </select>  



        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $producto->NOMBRE_PRODUCTO; ?>" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" value="<?php echo $producto->DESCRIPCION; ?>" name="descripcion" required >
        </div>
        <input type="hidden" name="id" value="<?php echo $producto->COD_PRODUCTO; ?>">
        <button type="submit" class="btn btn-default">Actualizar</button>
    </form>
<?php else: ?>
    <p class="alert alert-danger">404 No se encuentra</p>
<?php endif; ?>