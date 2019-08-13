<pre>
<?php 

    function mysql_getdata($script){

        $con = mysqli_connect("localhost","root","","easycommands") or die(mysqli_connect_error());


        $value = mysqli_query($con,$script) or die();

        $resp = array();

        while($linha = mysqli_fetch_array($value, MYSQLI_ASSOC)){
            array_push($resp , $linha);
        
        }
        return $resp;

    }

?>
</pre>