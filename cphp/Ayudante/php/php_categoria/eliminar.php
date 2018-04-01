<?php

if (!empty($_GET)) {
    include "../../php/conexion.php";

    $sql = "DELETE FROM CATEGORIA WHERE ID_CATEGORIA=" . $_GET["id"];
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Eliminado exitosamente.\");window.location='../../ver_categoria.php';</script>";
    } else {
        print "<script>alert(\"No se pudo eliminar debido a que ciertos productos utilizan esta categoria.\");window.location='../../ver_categoria.php';</script>";
    }
}
?>