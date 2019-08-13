function functionConfirm(msg, sim, nao) {
    $('#vaiFikaTudoPreto').show();
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text("Deseja Realmente Sair?");
    confirmBox.find(".yes,.no").unbind().click(function() {
       confirmBox.hide();
    });
    function sim(){
        $('#vaiFikaTudoPreto').hide();
        window.location.replace("assets/php/logout.php");
        close;
    }
    function nao(){
        $('#vaiFikaTudoPreto').hide();
    }
    confirmBox.find(".yes").click(sim);
    confirmBox.find(".no").click(nao);
    confirmBox.show();
 }
