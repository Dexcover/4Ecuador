<?php

include "./php/conexion.php";

$user_id=null;
$sql1= "select PRODUCTO.COD_PRODUCTO,NOMBRE_PRODUCTO,DESCRIPCION,CANTIDAD_PRODUCTO_CENTRO FROM PRODUCTO,PRODUCTO_CENTRO WHERE PRODUCTO.COD_PRODUCTO=PRODUCTO_CENTRO.COD_PRODUCTO;";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre_Producto</th>
	<th>Detalle</th>
	<th>Cantidad</th>
	
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["NOMBRE_PRODUCTO"]; ?></td>
	<td><?php echo $r["DESCRIPCION"]; ?></td>
	<td><?php echo $r["CANTIDAD_PRODUCTO_CENTRO"]; ?></td>
	
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
