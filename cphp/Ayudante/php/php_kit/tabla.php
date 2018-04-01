
<?php
include "php/conexion.php";

$user_id = null;
$sql1 = "select * from PRODUCTO ;";
$query = $con->query($sql1);
?>

<?php if ($query->num_rows > 0): ?>

    <form name="formulario" role="form" method="post" action="php/php_kit/agregar.php">
        
        <h3>Nombre del KIT:</h3> <input type="text" class="input-sm" name="nombre_kit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="button" id="button" class="btn btn-default" value="CREAR" /><br><br>
        
        <table class="table table-bordered table-hover">
            <thead>
            <th>Producto</th>
            <th>Cantidad</th>
            
            </thead>
               
            <?php while ($r = $query->fetch_array()): ?>
                <tr>
                
                <td><input type="checkbox" class="checkbox-inline" name="nombre[]" id="nombre" value="<?php echo $r["COD_PRODUCTO"]; ?>" >&nbsp;&nbsp;&nbsp; <?php echo $r["NOMBRE_PRODUCTO"]; ?></td>

                <td><input type="text" class="input-sm" name="cantidad[]" ></td>

                </tr>
            <?php endwhile; ?>

                
        </table>


    </form>
<?php else: ?>
    <p class="alert alert-warning">No hay resultados</p>
<?php endif; ?>
 