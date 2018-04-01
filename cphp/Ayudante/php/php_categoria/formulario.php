<?php
include "php/conexion.php";

$user_id = null;
$sql1="select * from CATEGORIA where ID_CATEGORIA = " . $_GET["id"];

$s="ALTER TABLE CATEGORIA AUTO_INCREMENT =1"; 
$sql2 = "select * from CATEGORIA";

$query = $con->query($sql1);
$query1 = $con->query($sql2);
$query2 = $con->query($s);
$categoria = null;



if ($query->num_rows > 0) {
    while ($r = $query->fetch_object()) {
        $categoria = $r;
        break;
    }
}
?>

<?php if ($categoria != null): ?>

    <form role="form" method="post" action="php/php_categoria/actualizar.php">
        <div class="form-group" style="display:none;">
            <label for="codigo">Id Categoría</label>
            <input type="text" class="form-control" value="<?php echo $categoria->ID_CATEGORIA; ?>" name="codigo" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <!--<input type="text" class="form-control" value="<?php //echo $producto->ID_CATEGORIA;  ?>" name="categoria" required>-->



        </div>
        <div class="form-group">
            <label for="categoria">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $categoria->CATEGORIA; ?>" name="categoria" required>
        </div>
        
        <input type="hidden" name="id" value="<?php echo $categoria->ID_CATEGORIA; ?>">
        <button type="submit" class="btn btn-default">Actualizar</button>
    </form>
<?php else: ?>
    <p class="alert alert-danger">404 No se encuentra</p>
<?php endif; ?>