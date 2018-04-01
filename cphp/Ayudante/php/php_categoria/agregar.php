<?php

//if(!empty($_POST)){
	if(isset($_POST["nombre"])){
		if($_POST["nombre"]!=""){
			
			include "../../php/conexion.php";
                        
                                           
                        $alt="ALTER TABLE CATEGORIA AUTO_INCREMENT =1";
			$sql = "INSERT INTO `CATEGORIA`(`ID_CATEGORIA`, `CATEGORIA`) VALUES (\"$_POST[nombre]\",\"$_POST[nombre]\")";
                        
                        $query = $con->query($alt);
			$query = $con->query($sql);
                        
                        
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../../ver_categoria.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../../ver_categoria.php';</script>";

			}
		}
        }
//}



?>