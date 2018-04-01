<?php

include "./php/conexion.php";

$user_id=null;
$sql1= "SELECT * FROM KIT;";

$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>CODIGO</th>
	<th>NOMBRE</th>
	
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["COD_KIT"]; ?></td>
	<td><?php echo $r["NOMBRE_KIT"]; ?></td>
	
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
