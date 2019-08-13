<?php
    include_once("../../../assets/services/table-service.php");

    $numeroMesa = $_POST["mesa_numero"];

    $mesas = mysql_getdata("SELECT * FROM mesas");

    foreach($mesas as $value){
        if($value["numero"] == $numeroMesa){
            http_response_code(401);
            $response = [ 
            'success' => false,
            'message' => 'Esta mesa já existe!'
            ];
        };
    };

?>

