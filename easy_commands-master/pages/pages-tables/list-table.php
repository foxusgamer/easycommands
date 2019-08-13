<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

?>

<div class="page-container">
    <div class="fill bg-tables">
        <br>
        <div class="container-fluid list-table">
            <div class="row">
                <div class="col-md-11">
                    <div class="row" id="cardsRow">
    
                    </div>            
                </div>
        
                <div class="col-md-1">
                    <button  class="add-table bg-dark" onclick="addTable()">
                       <i class="text-light fas fa-plus"></i>
                    </button>
                </div>
        
            </div>
        </div>
    </div>
</div>

<script src="./assets/javascript/list-table.js">


</script>