function getAllRecords() {

    var table = "<table id='reportTable' class='table table-hover'>";
    $.ajax({
        url: "src/controller/WarehousesController.php?op=getTableHeader",
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
            url: "src/controller/WarehousesController.php?op=getAllData",
            type: 'get',
            dataType: 'json'
        }).done(function (data) {

            table += "<tbody>";
            $.each(data, function (i, v) {
                console.log(v);
                //var state = (parseInt(v.ESTATUSREGISTRO) === 1) ? "ACTIVO" : "INACTIVO";
                table += "<tr>";
                table += "<td><span class='fa fa-pencil iconWarning' onclick='update(" + v.ID + ")'></span></td>";                                
                table += "<td>" + v.CLAVEALMACEN  + "</td>"; 
                table += "<td>" + v.NOMBREREAL + "</td>";
                table += "<td>" + v.CLAVEACENDEP + "</td>";
                table += "<td>" + v.TIPO + "</td>";
                table += "<td>" + v.CLAVEPERSONALRESPONSABLE + "</td>";
                table += "<td>" + v.OBSERVACIONES + "</td>";
                table += "<td>" + v.CLAVEUSUARIOALTA + "</td>";
                table += "<td>" + v.FECHAALTA + "</td>";
                table += "<td>" + v.CLAVEUSUARIOCAMBIO + "</td>";
                table += "<td>" + v.FECHACAMBIO + "</td>";            
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
            url: 'src/controller/WarehousesController.php?op=add',
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
        url: 'src/controller/WarehousesController.php?op=getById',
        type: "post",
        contenType: "application/json",
        dataType: 'json',
        data: {"id": id}
    }).done(function (data) {              
        
        
        $('#idm').val(data.ID);
        $('#keyWarehousesm').val(data.CLAVEALMACEN);
        $("#realNamem").val(data.NOMBREREAL);
        $("#keyAcendepm").val(data.CLAVEACENDEP);
        $("#typem").val(data.TIPO);
        $("#keyResponsabem").val(data.CLAVEPERSONALRESPONSABLE);
        $("#obsm").val(data.OBSERVACIONES);
        

    });
}
function saveUpdated() {
    if ($("#frmUpdate").validationEngine('validate')) {
        $.ajax({
            url: 'src/controller/WarehousesController.php?op=update',
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