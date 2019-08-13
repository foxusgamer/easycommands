<?php
include_once("../../../assets/services/products-service.php");                    
$list_mesa = mysql_getdata("SELECT * from mesas inner join comandas on comandas.mesas_id = mesas.id 
where comandas.status = 0 ORDER BY numero ASC"); 
foreach ($list_mesa as  $key =>$value){
    $id_comanda = $value['id'];
    echo '<tr>
            <td><a href="#fatura"><button style="width: -webkit-fill-available;"class="btn btn-sm btn-warning" 
            onclick="open_table('.$id_comanda.')" >MESA '.$value["numero"].' </button></a></td>            
          </tr>';
}
?>