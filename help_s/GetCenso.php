<?php
	
	$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
	mysql_select_db("4ecuador3");
	$sql = "SELECT NOMBRES, APELLIDOS, MIEMBROS FROM CENSO";
	$datos = array();
	$rs = mysql_query($sql, $con);
	while ($row = mysql_fetch_object($rs)){
		$datos[] = $row;
	}
	echo json_encode($datos);

?>