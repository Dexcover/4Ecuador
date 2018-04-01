<?php

if (!empty($_GET)) {
    include "../../php/conexion.php";

    $sql = "DELETE FROM CENTRO WHERE ID_CENTRO=" . $_GET["id"];
    $query = $con->query($sql);
    if ($query != null) {
        print "<script>alert(\"Eliminado exitosamente.\");window.location='../../ver_centro.php';</script>";
    } else {
        print "<script>alert(\"No se pudo eliminar.\");window.location='../../ver_centro.php';</script>";
    }
}
?>