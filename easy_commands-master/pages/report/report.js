function getReport(){
    $.ajax({
        method: "POST",
        url: "./pages/report/get-report.php",
        success:function(html){
            $('#tbody').html(html);
        }
    })
}

getReport();