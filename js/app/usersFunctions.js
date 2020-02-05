function addNew() {
    document.getElementById('frmAdd').reset();
}
function saveNew() {
    if ($("#frmAdd, #frmUpdate").validationEngine('validate')) {

        $.ajax({
            url: 'src/controller/UsersController.php?op=addUser',
            type: "post",
            dataType: 'json',
            data: $("#frmAdd").serialize()
        }).done(function (data) {
            if (data.state === true) {
                new PNotify({
                    title: 'OK',
                    text: data.message,
                    type: 'success'
                });
                document.getElementById('frmAdd').reset();
                $("#modalAdd").modal('hide');
                getAllUsers();
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
function resetPassword(user) {
    $("#modalResetPassword").modal("show");
    $("#idUserr").val(user);
}
function reset() {
    if ($("#frmReset").validationEngine('validate')) {
        $.ajax({
            url: 'src/controller/UsersController.php?op=resetPassword',
            type: "post",
            dataType: 'json',
            data: $("#frmReset").serialize()
        }).done(function (data) {
            if (data.state === true) {
                new PNotify({
                    title: 'OK',
                    text: data.message,
                    type: 'success'
                });
                $("#modalResetPassword").modal('hide');
                $("#password").val("");
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
function update(user) {
    $("#modalUpdate").modal('show');
    $.ajax({
        url: 'src/controller/UsersController.php?op=getUserById',
        type: "post",
        contenType: "application/json",
        dataType: 'json',
        data: {"user": user}
    }).done(function (data) {
        console.log(data);
        $("#idUserm").val(data.IDUSER);
        $("#namem").val(data.NAME);
        $("#lastNamem").val(data.LASTNAME);
        $("#lastName2m").val(data.LASTNAME2);
        $("#mailm").val(data.MAIL);
        $("#userm").val(data.USER);
        $("#statem").val(data.STATE);

    });
}
function saveUpdated() {
    if ($("#frmUpdate").validationEngine('validate')) {
        $.ajax({
            url: 'src/controller/UsersController.php?op=updateUser',
            type: "post",
            dataType: 'json',
            data: $("#frmUpdate").serialize()
        }).done(function (data) {
            if (data.state === true) {
                new PNotify({
                    title: 'OK',
                    text: data.message,
                    type: 'success'
                });
                document.getElementById('frmUpdate').reset();
                $("#modalUpdate").modal('hide');
                getAllUsers();
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
function roles(user) {
    $("#modalRoles").modal('show');
    var roles = "";
    $.ajax({
        url: "src/controller/UsersController.php?op=getAllRoles",
        type: 'get',
        dataType: 'json'
    }).done(function (data) {
        $.each(data, function (i, v) {
            roles += "<div class='form-check'>";
            roles += "<input type='checkbox' class='form-check-input' class='roleUser' name='role" + v.IDROLE + "' id='role" + v.IDROLE + "' onclick='setRole(" + v.IDROLE + ","+user+");'>";
            roles += "<label class='form-check-label' for='role" + v.IDROLE + "'>" + v.NAME + "</label>";

        });
        $("#rolesContainer").html(roles);

        $.ajax({
            url: "src/controller/UsersController.php?op=getRolesByUser",
            type: 'post',
            dataType: 'json',
            data: {'idUser': user}
        }).done(function (data) {
            $.each(data, function (i, v) {
                $("#role" + v.IDROLE).prop("checked", "checked");
            });
        });
    });

}
function setRole(role, user) {
    $.ajax({
        url: "src/controller/UsersController.php?op=setRole",
        type: 'post',
        dataType: 'json',
        data: {"role": role, "idUser": user}
    }).done(function (data) {
        if (data.state === true) {
            new PNotify({
                title: 'OK',
                text: data.message,
                type: data.op
            });                                    
        } else {
            new PNotify({
                title: 'ERROR',
                text: data.message,
                type: 'error'
            });
        }
    });
}
function getAllUsers() {

    var table = "<table id='reportTable' class='table table-hover'>";
    $.ajax({
        url: "src/controller/UsersController.php?op=getAllUsersTableHeader",
        type: 'get',
        dataType: 'json'
    }).done(function (data) {
        table += "<thead>";
        table += "<tr>";
        $.each(data, function (i, v) {
            table += "<th>" + v + "</th>";
        });
        table += "</tr>";
        table += "</thead>";
        $.ajax({
            url: "src/controller/UsersController.php?op=getAllUsers",
            type: 'get',
            dataType: 'json'
        }).done(function (data) {

            table += "<tbody>";
            $.each(data, function (i, v) {
                
                var state = (parseInt(v.STATE) === 1) ? "ACTIVO" : "INACTIVO";
                table += "<tr>";
                table += "<td><span class='fa fa-undo iconDanger' onclick='resetPassword(" + v.IDUSER + ")'></span></td>";
                table += "<td><span class='fa fa-pencil iconWarning' onclick='update(" + v.IDUSER + ")'></span></td>";
                table += "<td><span class='fa fa-gears iconPrimary' onclick='roles(" + v.IDUSER + ")'></span></td>";
                table += "<td>" + v.NAME + " " + v.LASTNAME + " " + v.LASTNAME2 + "</td>";
                table += "<td>" + v.MAIL + "</td>";
                table += "<td>" + v.USER + "</td>";
                table += "<td>" + state + "</td>";                
                table += "</tr>";
            });

            table += "</tbody>";
            table += "</table>";

            $("#reportContainer").html(table);

            $('#reportTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {"extend": "copy", "className": "btnDataTable"},
                    {"extend": "csv", "className": "btnDataTable"},
                    {"extend": "excel", "className": "btnDataTable"},
                    {"extend": "pdf", "className": "btnDataTable"},
                    {"extend": "print", "className": "btnDataTable"}
//'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    });


}

function validUser(field, rules, i, options) {
    var valid = false;
    var message = null;

    $.ajax({
        url: "src/controller/UsersController.php?op=validUser",
        type: 'post',
        async: false,
        dataType: 'json',
        data: {"user": field.val()}
    }).done(function (data) {

        if (data.response === true) {
            valid = true;
        } else {
            message = data.message;
        }
    });

    if (!valid) {
        return message;
    }

}

