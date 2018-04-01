<?php  
	
	
	$id 	= $_POST['id'];
	$name 	= $_POST['name'];
	$code 	= $_POST['code'];
	$arr  	= array ('success'=>'false');
	
	if ( (strlen($name)>0) ){
		$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
		mysql_select_db("4ecuador3");

		$sql = "INSERT INTO PRODUCTO(COD_PRODUCTO, ID_CATEGORIA, NOMBRE_PRODUCTO, DESCRIPCION, HABILITADO)
			VALUES('$code', '$id', '$name', '$name', 'S')";
		
		$rs  = mysql_query($sql, $con);
		if ($rs) {
			$arr = array ('success'=> true);
		}
	}
	
	echo json_encode($arr);

?>