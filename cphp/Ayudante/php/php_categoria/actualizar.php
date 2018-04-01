<?php

if(!empty($_POST)){
	if(isset($_POST["categoria"])){
		if($_POST["categoria"]!=""){
			include "../../php/conexion.php";

			$sql = "update CATEGORIA set CATEGORIA=\"$_POST[categoria]\" where ID_CATEGORIA=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../../ver_categoria.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../../ver_categoria.php';</script>";

			}
		}
	}
}



?>