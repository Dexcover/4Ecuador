<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?
      include('modeloPagina/head.php');
      ?>
<?php

include "./php/conexion.php";

$user_id=null;
$sql1= "select * from PRODUCTO ORDER BY NOMBRE_PRODUCTO;";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Codigo</th>
	<th>Categoria</th>
	<th>Nombre</th>
	<th>Descripcion</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["COD_PRODUCTO"]; ?></td>
	<td><?php echo $r["ID_CATEGORIA"]; ?></td>
	<td><?php echo $r["NOMBRE_PRODUCTO"]; ?></td>
	<td><?php echo $r["DESCRIPCION"]; ?></td>
	<td style="width:150px;">
		<a href="php/php_producto/editar.php?id=<?php echo $r["COD_PRODUCTO"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["COD_PRODUCTO"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["COD_PRODUCTO"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/php_producto/eliminar.php?id="+<?php echo $r["COD_PRODUCTO"];?>;

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
