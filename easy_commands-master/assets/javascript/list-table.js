function editarMesa(numero) {

    var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", false).focus();
}


function saveNumber(numero, id) {
    var campo = document.getElementById("numeroMesa" + numero);
    $(campo).prop("disabled", true);
    error = false;

    $.ajax({
        method: "POST",
        url: "pages/pages-tables/controller/check-table-number.php",
        data: { mesa_numero: $(campo).val()},
        success: function () {
            $.ajax({
                method: "POST",
                url: "pages/pages-tables/controller/edit-table-number.php",
                data: { mesa_numero: $(campo).val(), mesa_id: id },
                success: function () {
                    refreshTable();
                }
            })
        },
        error: function(){
            refreshTable();
        }
    })
    


}

function addTable(){
    $.ajax({
        method: "POST",
        url: "pages/pages-tables/controller/add-table.php",
        success: function () {
            refreshTable();
        }
    })
}

function deleteTable(idMesa){
    $.ajax({
        method: "POST",
        url: "pages/pages-tables/controller/delete-table.php",
        data: {id: idMesa},
        success: function () {
            refreshTable();
        }
    })
}

function refreshTable(){
    $.ajax({
        method: "POST",
        url: "./pages/pages-tables/controller/refresh-table.php",
        success: function (html) {
            $('#cardsRow').html(html);
        }
    })
}

function changePref(pref,numero){
    
    if(pref == 0){
        prefChange = 1
    }else{
        prefChange = 0;
    }
    $.ajax({
        type: 'POST',
        url: 'pages/pages-tables/controller/alter-table-pref.php',
        data: 
            {pref: prefChange, numero_mesa: numero},
        success: function () {
            refreshTable();
        }
    });  
    
}

refreshTable();


