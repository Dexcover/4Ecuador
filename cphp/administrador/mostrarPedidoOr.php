<?php
function mostrar($parametro){
$id_centro=$_SESSION['ID_CENTRO'];
$sqlex="SELECT * FROM CENTRO WHERE ID_CENTRO='$id_centro' ";
$checkex2 = mysqli_query(enviaconex(), $sqlex)or die(mysql_error());
while($extResex2 = mysqli_fetch_array( $checkex2)){
  $nombre_centro=utf8_encode($extResex2['NOMBRE_CENTRO']);
}
                        $cont=0;
                        $sql="SELECT * FROM PEDIDO WHERE TIPO_PEDIDO='ORDINARIA' AND ESTADO='$parametro' ORDER BY FECHA DESC";
                        $data=mysqli_query(enviaconex(),$sql)or die(mysql_error());
                        while ($info = mysqli_fetch_array($data)) {
                          $cont+=1;
                          //ID_PEDIDO
                          $idPedido=$info['ID_PEDIDO'];
                          //fecha
                          $fecha=$info['FECHA'];
                          //estado
                          $estado=$info['ESTADO'];
                          //Observaciones
                          $observacion=$info['DESCRIPCION'];
                            echo "<tr>";
                            echo "<td>$fecha</td>";
                            echo "<td>$nombre_centro</td>";
                            echo "<td>$estado</td>";
                            echo "<td><input disabled type='text' id='ob$cont' value='$observacion' /></td>";
                            ?>
                              <td>
                                <button id="binfo<?echo "$cont";?>" class="btn btn-info" onclick="realizaProceso('<?echo $idPedido;?>','info<?echo "$cont";?>','ocultar<?echo "$cont";?>','ob<?echo "$cont";?>'); return false;">Detalles del Pedido</button>
                                <button id="ocultar<?echo "$cont";?>" style="display: none" class="btn btn-primary" onclick="ocultar('info<?echo "$cont";?>','ocultar<?echo "$cont";?>','ob<?echo "$cont";?>'); return false;">Ocultar Detalles</button>

                              <div id="info<?echo $cont;?>" style="display: none">

                              </div>
                              </td>

<?php }} ?>
