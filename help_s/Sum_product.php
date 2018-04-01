<?php  
	$code 		= $_POST['code'];
	$place 		= $_POST['place'];
	$arr  		= array ('success'=>'false');
	
	if ( (strlen($code)>0) && ($place>0) ){
		$con = mysql_connect("mysql.4ecuador.infodesarrollo.ec", "upsecuador", "Ups.2016");
		mysql_select_db("4ecuador3");

		$sql_item = ("SELECT CANTIDAD_PRODUCTO_CENTRO FROM PRODUCTO_CENTRO WHERE COD_PRODUCTO = '".$code."' AND ID_CENTRO = '".$place."';");
		$rs1  = mysql_query($sql_item, $con);
		$rs1  = mysql_fetch_array(mysql_query($sql_item, $con));
		
		$data  = array ('amount'=> $rs1["CANTIDAD_PRODUCTO_CENTRO"]==null?-1:$rs1["CANTIDAD_PRODUCTO_CENTRO"]);
		$total = $data['amount'];
		
		if ($total >= 0){
			$total = $total+1;
			$sql = ("UPDATE PRODUCTO_CENTRO SET CANTIDAD_PRODUCTO_CENTRO = ".$total." WHERE COD_PRODUCTO = '".$code."' AND ID_CENTRO = '".$place."';");		
			$rs  = mysql_query($sql, $con);
			if ($rs) {
				$arr = array ('success'=> true);
			}
		}else{
			$sql = ("INSERT INTO PRODUCTO_CENTRO (ID_CENTRO, COD_PRODUCTO, CANTIDAD_PRODUCTO_CENTRO, HABILITADO )VALUES (".$place.", ".$code.", 1, 'S');");		
			$rs  = mysql_query($sql, $con);
			if ($rs) {
				$arr = array ('success'=> true);
			}
		}
	}
	
	echo json_encode($arr);

?>

60
