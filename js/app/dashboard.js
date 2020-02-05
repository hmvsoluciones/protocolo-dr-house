function modalPW(){
    document.getElementById("frmUpdatePassword").reset();
    $("#modalChangePassword").modal();
}
function updatePassword() {
    if ($("#frmUpdatePassword").validationEngine('validate')) {
        $.ajax({
            url: 'src/controller/UsersController.php?op=updatePassword',
            type: "post",
            dataType: 'json',
            data: $("#frmUpdatePassword").serialize()
        }).done(function (data) {
            if (data.state === true) {
                new PNotify({
                    title: 'OK',
                    text: data.message,
                    type: 'success'
                });
                $("#modalChangePassword").modal('hide');
                document.getElementById("frmUpdatePassword").reset();
            } else {
                new PNotify({
                    title: 'ERROR',
                    text: data.message,
                    type: 'error'
                });
            }
        });
    }
}

$(document).ready(function () {
    $('.menuItem').click(function (event) {
        event.preventDefault();
        var view = $(this).attr('href');

        $.ajax({
            url: view,
            type: 'get',
            beforeSend: function () {
                var loading = "<div class='row'>";
                loading += " <div class='col-md-12 col-sm-12 col-xs-12'>";
                loading += "    <div class='x_panel' style=´'height:300px;'>";
                loading += "        <div class='x_title'>";
                loading += "            <h2></h2>";
                loading += "            <div class='clearfix'></div>";
                loading += "        </div>";             
                loading += "        <div align='center'><img src='images/ajax-loader.gif' alt=''/></div>";
                loading += "    </div>";
                loading += " </div>";
                loading += "</div>";
                
                $("#mainContainer").html(loading);
            }
        }).done(function (content) {
            $("#mainContainer").html(content);
        });

    });
});
