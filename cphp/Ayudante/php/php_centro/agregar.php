<?php

//if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["direccion"]) &&isset($_POST["ciudad"]) &&isset($_POST["provincia"])){
		if($_POST["nombre"]!=""&&$_POST["direccion"]!=""&&$_POST["ciudad"]!=""&&$_POST["provincia"]!=""){
			
			//echo"\"$_POST[codigo]\",\"$_POST[nombre]\",\"$_POST[direccion]\",\"$_POST[ciudad]\",\"$_POST[provincia]\"";          

			include "../../php/conexion.php";
			 $alt="ALTER TABLE CENTRO AUTO_INCREMENT =1";
			$sql = "INSERT INTO `CENTRO`(`ID_CENTRO`, `NOMBRE_CENTRO`, `DIRECCION_CENTRO`, `CIUDAD_CENTRO`, `PROVINCIA_CENTRO`) VALUES (\"$_POST[codigo]\",\"$_POST[nombre]\",\"$_POST[direccion]\",\"$_POST[ciudad]\",\"$_POST[provincia]\")";
                        $query = $con->query($alt);
			$query = $con->query($sql);


			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../../ver_centro.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../../ver_centro.php';</script>";

			}
		}
        }
//}



?>