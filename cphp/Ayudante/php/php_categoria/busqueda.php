<?php

include "./php/conexion.php";

$user_id=null;
$sql1= "select * from CATEGORIA where ID_CATEGORIA like '%$_GET[s]%' or CATEGORIA like '%$_GET[s]%'";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Id. Categoría</th>
	<th>Categoria</th>
	
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["ID_CATEGORIA"]; ?></td>
	<td><?php echo $r["CATEGORIA"]; ?></td>
            <td style="width:150px;">
		<a href="./editar_categoria.php?id=<?php echo $r["ID_CATEGORIA"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["ID_CATEGORIA"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["CATEGORIA"];?>).click(function(e){
			e.preventDefault();
			p = confirm("¿Está seguro de aplicar el cambio?");
			if(p){
				window.location="./php/php_categoria/eliminar.php?id="+<?php echo $r["ID_CATEGORIA"];?>;

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
