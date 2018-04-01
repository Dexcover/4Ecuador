<?php

//if(!empty($_POST)){
	if(isset($_POST["categoria"]) &&isset($_POST["nombre"]) &&isset($_POST["descripcion"])){
		if($_POST["categoria"]!=""&&$_POST["nombre"]!=""&&$_POST["descripcion"]!=""){
			include "../../php/conexion.php";
			
			$sql = "insert into PRODUCTO(COD_PRODUCTO,ID_CATEGORIA,NOMBRE_PRODUCTO,DESCRIPCION,IS_ENABLE,IN_TRASH,IS_DELETE) value (\"$_POST[codigo]\",\"$_POST[categoria]\",\"$_POST[nombre]\",\"$_POST[descripcion]\",\"N\",\"N\",\"N\")";
                        
			$query = $con->query($sql);
                        
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../../ver_producto.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../../ver_producto.php';</script>";

			}
		}
        }
//}



?>