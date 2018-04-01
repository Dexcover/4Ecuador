<?php  
	
	$id 		= $_POST['id'];
	$product 	= $_POST['product'];
	$amount 	= $_POST['amount'];
	//$lastname = $_POST['priority'];
	$arr  		= array ('success'=>'false');
	
	if ( (strlen($product)>0)&&($amount>0) ){
		$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
		mysql_select_db("4ecuador3");

		$sql_codigo = ("SELECT COD_PRODUCTO FROM PRODUCTO WHERE NOMBRE_PRODUCTO = '".$product."' AND HABILITADO = 'S' LIMIT 1;");
		$rsc  = mysql_query($sql_codigo, $con);
		$rsc  = mysql_fetch_array(mysql_query($sql_codigo, $con));
		$codigo = $rsc["COD_BARRAS"];
		
				
		
		$sql_item = ("SELECT CANTIDAD_PRODUCTO_CENTRO FROM PRODUCTO_CENTRO WHERE COD_PRODUCTO = '".$codigo."' AND ID_CENTRO = '".$id."' AND HABILITADO = 'S' LIMIT 1;");
		$rs1   = mysql_query($sql_item, $con);
		$rs1   = mysql_fetch_array(mysql_query($sql_item, $con));
		$stock = $rs1["CANTIDAD_PRODUCTO_CENTRO"];
		
		$nstock = $stock - $amount;
		
		$sql = "UPDATE PRODUCTO_CENTRO SET CANTIDAD_PRODUCTO_CENTRO = '$nstock' WHERE COD_PRODUCTO = '".$codigo."' AND ID_CENTRO = '".$id."';";		
		$rs  = mysql_query($sql, $con);
		
		
		$sql = "INSERT INTO PEDIDO(ID_CENTRO, DESCRIPCION, FECHA, ESTADO, PRIORIDAD, TIPO_PEDIDO)VALUES('$id', '$product', NOW(), 'PENDIENTE', 'NORMAL', 'ORDINARIO')";		
		$rs  = mysql_query($sql, $con);
		if ($rs) {
			$arr = array ('success'=> true);
		}
	}
	
	echo json_encode($arr);

?>