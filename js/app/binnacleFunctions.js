function getAllRecords() {

    var table = "<table id='reportTable' class='table table-hover'>";
    $.ajax({
        url: "src/controller/DoctorsController.php?op=getAllDoctorsTableHeader",
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
            url: "src/controller/DoctorsController.php?op=getAllDoctors",
            type: 'get',
            dataType: 'json'
        }).done(function (data) {

            table += "<tbody>";
            $.each(data, function (i, v) {
                console.log(v);
                var state = (parseInt(v.ESTATUSREGISTRO) === 1) ? "ACTIVO" : "INACTIVO";
                table += "<tr>";
                table += "<td><span class='fa fa-pencil iconWarning' onclick='update(" + v.ID + ")'></span></td>";                                
                table += "<td>" + v.MATRICULAMEDICO  + "</td>";
                table += "<td>" + state + "</td>"; 
                table += "<td>" + v.RFC + "</td>";
                table += "<td>" + v.CURP + "</td>";
                table += "<td>" + v.CEDULAPROFESIONAL + "</td>";
                table += "<td>" + v.NOMBRE + "</td>";
                table += "<td>" + v.APELLIDOPATERNO + "</td>";
                table += "<td>" + v.APELLIDOMATERNO + "</td>";
                table += "<td>" + v.CLAVERUBROESPECIALIDAD + "</td>";
                table += "<td>" + v.CLAVEESPECIALIDAD + "</td>";
                table += "<td>" + v.TELEFONOS + "</td>";
                table += "<td>" + v.FECHAINGRESO + "</td>";
                table += "<td>" + v.OBSERVACIONES + "</td>";
                table += "<td>" + v.CLAVEUSUARIOALTA + "</td>";
                table += "<td>" + v.FECHAALTA + "</td>";                
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


function addNew() {
    document.getElementById('frmAdd').reset();
}
function saveNew() {
    if ($("#frmAdd, #frmUpdate").validationEngine('validate')) {

        $.ajax({
            url: 'src/controller/DoctorsController.php?op=add',
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
                getAllRecords();
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


function update(id) {
    $("#modalUpdate").modal('show');
    $.ajax({
        url: 'src/controller/DoctorsController.php?op=getById',
        type: "post",
        contenType: "application/json",
        dataType: 'json',
        data: {"id": id}
    }).done(function (data) {              
        
        
        $('#idm').val(data.ID);
        $('#doctorRegistrationm').val(data.MATRICULAMEDICO);
        $("#estatusm").val(data.ESTATUSREGISTRO);
        $("#rfcm").val(data.RFC);
        $("#curpm").val(data.CURP);
        $("#profesionalLicensem").val(data.CEDULAPROFESIONAL);
        $("#namem").val(data.NOMBRE);
        $("#lastNamem").val(data.APELLIDOPATERNO);
        $("#lastName2m").val(data.APELLIDOMATERNO);
        $("#specialityKeym").val(data.CLAVERUBROESPECIALIDAD+"-"+data.CLAVEESPECIALIDAD);                                                                
        $("#phonem").val(data.TELEFONOS);
        $("#admisionDatem").val(data.FECHAINGRESO);
        $("#observationsm").val(data.OBSERVACIONES);                
        $("#statem").val(data.ESTATUSREGISTRO);

    });
}
function saveUpdated() {
    if ($("#frmUpdate").validationEngine('validate')) {
        $.ajax({
            url: 'src/controller/DoctorsController.php?op=update',
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
                getAllRecords();
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