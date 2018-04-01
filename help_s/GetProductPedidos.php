<?php  

	$id  = $_POST['id'];
	$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
	mysql_select_db("4ecuador3");
	$sql = "SELECT
		(SELECT NOMBRE_PRODUCTO FROM PRODUCTO WHERE PRODUCTO.COD_PRODUCTO = PRODUCTO_CENTRO.COD_PRODUCTO)AS PRODUCTO,
		CANTIDAD_PRODUCTO_CENTRO
		FROM 
		PRODUCTO_CENTRO
		WHERE 
		ID_CENTRO  = ".$id." AND CANTIDAD_PRODUCTO_CENTRO > 0";

	$datos = array();
	$rs = mysql_query($sql, $con);
	while ($row = mysql_fetch_object($rs)){
		$datos[] = $row;
	}
	echo json_encode($datos);

?>