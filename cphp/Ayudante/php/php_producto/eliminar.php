<?php

if (!empty($_GET)) {
    include "../../php/conexion.php";

    $sql = "DELETE FROM PRODUCTO WHERE COD_PRODUCTO=" . $_GET["id"];
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Eliminado exitosamente.\");window.location='../../ver_producto.php';</script>";
    } else {
        print "<script>alert(\"No se pudo eliminar debido a que este producto pertenece a un KIT .\");window.location='../../ver_producto.php';</script>";
    }
}
?>