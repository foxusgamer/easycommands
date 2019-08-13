<?php
//Include the database configuration file
$con = mysqli_connect("localhost","root","","easycommands") or die(mysqli_connect_error());

echo $_POST["categorias_id"];
if(!empty($_POST["categorias_id"])){

    //Fetch all state data
    $query = mysqli_query($con,"SELECT * FROM produtos WHERE categorias_id = ".$_POST['categorias_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Selecione o Produto</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
        }
    }else{
        echo '<option value="">Nenhum produto disponível</option>';
    }
}
?>