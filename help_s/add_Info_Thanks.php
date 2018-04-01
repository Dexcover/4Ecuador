<?php  
	
	
	$idcentro 	= $_POST['idcentro'];
	$name 	= $_POST['name'];
	$email 	= $_POST['email'];
	$arr  	= array ('success'=>'false');
	
	if ( (strlen($name)>0) ){
		$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
		mysql_select_db("4ecuador3");

		$sql = "INSERT INTO AGRADECIMIENTO(ID_CENTRO ,FECHA ,NOMBRE_PERSONA, CORREO, ENVIADO)
			VALUES('$idcentro',(SELECT CURDATE()),'$name', '$email', 'N')";
		
		$rs  = mysql_query($sql, $con);
		if ($rs) {
			$arr = array ('success'=> true);
		}
	}
	
	echo json_encode($arr);

?>