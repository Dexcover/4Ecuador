<?php

if(!empty($_POST)){
	if(isset($_POST["codigo"]) &&isset($_POST["categoria"]) &&isset($_POST["nombre"]) &&isset($_POST["descripcion"])){
		if($_POST["codigo"]!=""&& $_POST["categoria"]!=""&&$_POST["nombre"]!=""&&$_POST["descripcion"]!=""){
			include "../../php/conexion.php";
			//ECHO"codigooo: "+$_POST["id"];
			$sql = "update PRODUCTO set COD_PRODUCTO=\"$_POST[codigo]\",ID_CATEGORIA=\"$_POST[categoria]\",NOMBRE_PRODUCTO=\"$_POST[nombre]\",DESCRIPCION=\"$_POST[descripcion]\",IS_ENABLE=\"N\",IN_TRASH=\"N\",IS_DELETE=\"N\" where COD_PRODUCTO=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../../ver_producto.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../../ver_producto.php';</script>";

			}
		}
	}
}



?>