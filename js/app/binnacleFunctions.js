function binnacleSearch() {
    if($("#frmBinnacleSearch").validationEngine('validate')){
        
        var table = "<table id='reportTable' class='table table-hover'>";
        $.ajax({
            url: "src/controller/BinnacleController.php?op=getBinnacleTableHeader",
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
                url: "src/controller/BinnacleController.php?op=binnacleSearch",
                type: 'post',
                dataType: 'json',
                data: $("#frmBinnacleSearch").serialize()
            }).done(function (data) {

                table += "<tbody>";
                $.each(data, function (i, v) {                                    
                    table += "<tr>";                    
                    table += "<td>" + v.IDBINNACLE  + "</td>";
                    table += "<td>" + v.REFERENCEID + "</td>"; 
                    table += "<td>" + v.OPERATIONTABLE + "</td>";
                    table += "<td>" + v.OPERATION + "</td>";
                    table += "<td>" + v.OPERATIONDATE + "</td>";
                    table += "<td>" + v.OPERATIONTIME + "</td>";
                    table += "<td>" + v.NAME+" "+v.LASTNAME+" "+v.LASTNAME2 +"</td>";
                    table += "<td id='json-render"+i+"' class='json-render'>" + v.LASTVALUE + "</td>";
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

                $(".json-render").each(function(){			     	
                    try {
                        var str = $(this).html();
                        var data = JSON.parse(str);
                        var id = $(this).prop('id');
                        $('#'+id).jsonViewer(data, {collapsed: true, withQuotes: true});			    		
                        console.log("ok");
                    } catch(err) {
                        console.log(err);
                    }    	               
               });

            });
        });
    }

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