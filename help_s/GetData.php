<?php
	$amount = $_REQUEST["amount"];
	$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
	mysql_select_db("4ecuador");
	$sql = "SELECT * FROM PRODUCTO WHERE IS_ENABLE = 1";
	$datos = array();
	$rs = mysql_query($sql, $con);
	while ($row = mysql_fetch_object($rs)){
		$datos[] = $row;
	}
	echo json_encode($datos);

?>