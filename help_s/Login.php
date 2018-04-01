<?php


	$user = $_POST['username'];
	$pass = $_POST['password'];
	$arr  = array ('login'=>'');

	if ( (strlen($user)>0)&&(strlen($pass)>0) ){
		$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
		mysql_select_db("4ecuador3");

		$sql = "SELECT NOMBRE_USUARIO AS name , ID_CENTRO, 
			(SELECT NOMBRE_CENTRO FROM CENTRO WHERE CENTRO .ID_CENTRO = USUARIO .ID_CENTRO) AS NOMBRE_CENTRO
				FROM USUARIO WHERE CEDULA='$user' AND CLAVE = MD5('$pass') AND ACTIVO = 'S'  LIMIT 1";
		$rs  = mysql_query($sql, $con);
		$rs  = mysql_fetch_array(mysql_query($sql, $con));
		$arr = array ('login'=> $rs["name"]==null?'':$rs["name"], 'centro'=> $rs["ID_CENTRO"]==null?'':$rs["ID_CENTRO"], 'nombre'=> $rs["NOMBRE_CENTRO"]==null?'':$rs["NOMBRE_CENTRO"] );
	}

	echo json_encode($arr);

?>
