<?php
include "../../php/conexion.php";

$nombre_kit=$_POST['nombre_kit'];
$sql_k = "insert into KIT(COD_KIT,NOMBRE_KIT) values ('','$nombre_kit')";
$query_k = $con->query($sql_k);

$sql_c = "Select *from KIT where NOMBRE_KIT='$nombre_kit'";
$query_c = $con->query($sql_c);
$r = $query_c->fetch_object();

$cod=$r->COD_KIT;
//echo"CODIGO: $r->COD_KIT";



 
$lista=implode(',',$_POST['cantidad']);
$separar = explode(',',$lista);
//echo"<br>Cantidad: ";print_r($separar);

$array_1 = array_values(array_diff($separar, array('')));
/*echo"<br>SEPARAR_ARRAY: ";
print_r($array_1);*/
$num = count($array_1);


for ($i = 0; $i < $num; $i++) {
    list($key, $value) = each($_POST['nombre']);
    
$sql = "insert into PRODUCTO_KIT(COD_KIT,COD_PRODUCTO,CANTIDAD_KIT) values ($cod,'$value',$array_1[$i])";

        $query = $con->query($sql);
       if ($query != null) {
        print "<script>alert(\"Agregado exitosamente.\");window.location='../../ver_kit.php';</script>";
    } else {
        print "<script>alert(\"No se pudo agregar.\");window.location='../../ver_kit.php';</script>";
    }
    
}
