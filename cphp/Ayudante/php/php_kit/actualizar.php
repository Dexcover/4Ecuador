<?php

if(!empty($_POST)){
	if(isset($_POST["nombre_kit"])){
		if($_POST["nombre_kit"]!=""){
			include "../../php/conexion.php";

			$sql = "update KIT set nombre_kit=\"$_POST[nombre_kit]\" where cod_kit=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../../ver_kit_1.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../../ver_kit_1.php';</script>";

			}
		}
	}
}



?>