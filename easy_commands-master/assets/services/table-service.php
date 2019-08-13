<pre>
<?php
function mysql_getdata($script){

$con = mysqli_connect("localhost","root","","easycommands") or die(mysqli_connect_error());


$valor = mysqli_query($con,$script) or die();

$resp = array();

while($linha = mysqli_fetch_array($valor, MYSQLI_ASSOC)){
    array_push($resp , $linha);

    
}


return $resp;

}


function mysql_insert($script){

    $con = mysqli_connect("localhost","root","","easycommands") or die(mysqli_connect_error());
    //echo $script;
    $dados = mysqli_query($con, $script) or die(mysqli_error($con));

    $afetada = mysqli_affected_rows($con);
    
    //echo $afetada;
    
    mysqli_close($con);

    return $afetada;

}


function mysql_update($script){

    $con = mysqli_connect("localhost","root","","easycommands") or die(mysqli_connect_error());

    $dados = mysqli_query($con, $script) or die(mysqli_error());

    $atualizou = mysqli_affected_rows($con);
    
    echo $atualizou;
    
    mysqli_close($con);

    return $atualizou;
}


function mysql_delete($script){

    $con = mysqli_connect("localhost","root","","easycommands") or die(mysqli_connect_error());
    $dados = mysqli_query($con, $script) or die(mysqli_error());

    $deletou = mysqli_affected_rows($con);
    
    echo $deletou;
    
    mysqli_close($con);

    return $deletou;
}
?>
</pre>