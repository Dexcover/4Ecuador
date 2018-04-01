<?php

if(!empty($_POST)){
	if(isset($_POST["codigo"]) &&isset($_POST["nombre"]) &&isset($_POST["direccion"]) &&isset($_POST["ciudad"]) &&isset($_POST["provincia"])){
		if($_POST["codigo"]!=""&& $_POST["nombre"]!=""&&$_POST["direccion"]!=""&&$_POST["ciudad"]!=""&& $_POST["provincia"]!=""){
			include "../../php/conexion.php";
			
			$sql = "update CENTRO set ID_CENTRO=\"$_POST[codigo]\",NOMBRE_CENTRO=\"$_POST[nombre]\",DIRECCION_CENTRO=\"$_POST[direccion]\",CIUDAD_CENTRO=\"$_POST[ciudad]\",PROVINCIA_CENTRO=\"$_POST[provincia]\" where ID_CENTRO=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../../ver_centro.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../../ver_centro.php';</script>";

			}
		}
	}
}



?>