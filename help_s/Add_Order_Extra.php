<?php  
	
	$id 		= $_POST['id'];
	$product 	= $_POST['product'];
	$amount 	= $_POST['amount'];
	//$lastname = $_POST['priority'];
	$arr  		= array ('success'=>'false');
	
	if ( (strlen($product)>0)&&($amount>0) ){
		$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
		mysql_select_db("4ecuador3");

		$sql = "INSERT INTO PEDIDO(ID_CENTRO, DESCRIPCION, FECHA, ESTADO, PRIORIDAD, TIPO_PEDIDO)VALUES('$id', '$product', NOW(), 'PENDIENTE', 'NORMAL', 'EXTRAORDINARIO')";		
		$rs  = mysql_query($sql, $con);
		if ($rs) {
			$arr = array ('success'=> true);
		}
	}
	
	echo json_encode($arr);

?>