<?php session_start();
include("../Seguridad/seguridadModulos.php");
 seguridadAyudante();
	 ?>
<html>
	<head>
		<?
		include('modeloPagina/head.php');
		?>
	</head>
	<body>
	<?php include "php/php_categoria/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>EDITAR</h2>

<?php include "php/php_categoria/formulario.php";?>

</div>
</div>
</div>


	</body>
</html>
