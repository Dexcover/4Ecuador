<?php

include "./php/conexion.php";

$user_id=null;
$sql1= "select * from CENTRO where NOMBRE_CENTRO like '%$_GET[s]%' or DIRECCION_CENTRO like '%$_GET[s]%' or CIUDAD_CENTRO like '%$_GET[s]%' or PROVINCIA_CENTRO like '%$_GET[s]%'";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Codigo</th>
	<th>nombre</th>
	<th>direccion</th>
	<th>ciudad</th>
        <th>provincia</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["ID_CENTRO"]; ?></td>
	<td><?php echo $r["NOMBRE_CENTRO"]; ?></td>
	<td><?php echo $r["DIRECCION_CENTRO"]; ?></td>
	<td><?php echo $r["CIUDAD_CENTRO"]; ?></td>
    <td><?php echo $r["PROVINCIA_CENTRO"]; ?></td>
	<td style="width:150px;">
		<a href="./editar_centro.php?id=<?php echo $r["ID_CENTRO"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["ID_CENTRO"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["ID_CENTRO"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/php_centro/eliminar.php?id="+<?php echo $r["ID_CENTRO"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
