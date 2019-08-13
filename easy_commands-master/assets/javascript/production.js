function refresh_production(id_pedido){
    $.ajax({
        url : "pages/pages-productions/controller/edit-production.php",
        type : 'POST',
        data : {idPedido: id_pedido},
    })
    .done(function(msg){
        //$("#resultado").html(msg);
        if(msg > 0){
            $("#notification").addClass("notification-animation bg-success ").html("Status Alterado com Sucesso");
        }
        else{
            $("#notification").addClass("notification-animation bg-success ").html("Pedido Finalizado");
        }
    $("#notification").addClass("notification-animation bg-success ").html("Pedido Finalizado");
})
}