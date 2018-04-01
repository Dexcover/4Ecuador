<?php

include "./php/conexion.php";

$user_id=null;
$sql1= "SELECT NOMBRE_KIT ,NOMBRE_PRODUCTO,CANTIDAD_KIT FROM KIT,PRODUCTO,PRODUCTO_KIT WHERE KIT.COD_KIT=PRODUCTO_KIT.COD_KIT AND PRODUCTO_KIT.COD_PRODUCTO=PRODUCTO.COD_PRODUCTO;";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>NOMBRE</th>
	<th>PRODUCTO</th>
	<th>CANTIDAD</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["NOMBRE_KIT"]; ?></td>
	<td><?php echo $r["NOMBRE_PRODUCTO"]; ?></td>
	<td><?php echo $r["CANTIDAD_KIT"]; ?></td>
	
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
