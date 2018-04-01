<html>
    <head>
        <title>ECUADOR</title>
        <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
        <script src="../../js/jquery.min.js"></script>
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>KITS DISPONIBLES</h2>



<?php

include "conexion.php";

$centro= $_POST['centro'];
$kit= $_POST['kit'];


//echo"centro: $centro";
//echo"kit: $kit";
/*----sacar la suma de los elementos repetidos----*/






$sqlk= "select * from producto_kit where COD_KIT=$kit ORDER BY COD_PRODUCTO";
$queryk = $con->query($sqlk);

$v=0;

while ($r=$queryk->fetch_array()):
$array_kit=$r["CANTIDAD_KIT"];//CANTIDADES DE LOS PRODUCTOS DEL KIT SELCCIONADO
$array_kit_prod=$r["COD_PRODUCTO"];//CODIGO DE LOS PRODUCTOS DEL KIT SELECCIONADO






//ECHO"CODIGO KIT: $array_kit_prod   CANTIDAD KIT: $array_kit";

$sqlc= "select * from producto_centro where COD_PRODUCTO=$array_kit_prod ORDER BY COD_PRODUCTO";
$queryc = $con->query($sqlc);
$r1=$queryc->fetch_array();

$array_centro_prod=$r1["COD_PRODUCTO"];
$numc=count($array_centro_prod);
$array_centro_cant=$r1["CANTIDAD_PRODUCTO_CENTRO"];//CANTIDADES DE LOS PRODUCTOS DEL KIT SELCCIONADO
//ECHO"CODIGO CENTRO: $array_centro_prod  CANTIDAD CENTRO: $array_centro_cant<BR>";

$val[]=round(($array_centro_cant/$array_kit), 0, PHP_ROUND_HALF_DOWN);//redondeo y guardo en arreglo
 //$v+=$val[];
//echo"valor: $val<br>";
$lista=implode(',',$val);
$separar = explode(',',$lista);

$min=min($separar);//cantidad de KIT disponible


endwhile;

?>
<center>
<h1>Disponibles</h1>
<h1><?php echo "$min"; ?></h1>	


<?php
$sqlnn= "select * from producto_kit where COD_KIT=$kit ORDER BY COD_PRODUCTO;";
$query = $con->query($sqlnn);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>PRODUCTO</th>
	<th>CANTIDAD</th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["COD_PRODUCTO"]; ?></td>
	<td><?php echo $r["CANTIDAD_KIT"]; ?></td>
	
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>




                </div>
            </div>
        </div>

        <script src="../../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>