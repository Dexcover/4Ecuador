<?php  
	
	
	$id 		= $_POST['id'];
	$name 		= $_POST['name'];
	$lastname 	= $_POST['lastname'];
	$member 	= $_POST['member'];
	$arr  		= array ('success'=>'false');
	
	if ( (strlen($id)== 10)&&(strlen($name)>0)&&(strlen($lastname)>0)&&(strlen($member)>0) ){
		$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
		mysql_select_db("4ecuador3");

		$sql = "INSERT INTO CENSO(ID_SENSO, NOMBRES, APELLIDOS, MIEMBROS, HABILITADO)VALUES('$id', '$name', '$lastname', $member, 'S')";		
		$rs  = mysql_query($sql, $con);
		if ($rs) {
			$arr = array ('success'=> true);
		}
	}
	
	echo json_encode($arr);

?>