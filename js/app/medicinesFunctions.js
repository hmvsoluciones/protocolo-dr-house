function getAllRecords() {

    var table = "<table id='reportTable' class='table table-hover'>";
    $.ajax({
        url: "src/controller/MedicinesController.php?op=getTableHeader",
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
            url: "src/controller/MedicinesController.php?op=getAllData",
            type: 'get',
            dataType: 'json'
        }).done(function (data) {

            table += "<tbody>";
            $.each(data, function (i, v) {
                console.log(v);
                var state = (parseInt(v.ESTATUSREGISTRO) === 1) ? "ACTIVO" : "INACTIVO";
                table += "<tr>";
                table += "<td><span class='fa fa-pencil iconWarning' onclick='update(" + v.ID + ")'></span></td>";                                
                table += "<td>" + v.CLAVEMEDICAMENTO  + "</td>";
                table += "<td>" + v.DESCRIPCION + "</td>"; 
                table += "<td>" + v.DESCCOMER + "</td>";
                table += "<td>" + v.CLAVESECTORSALUD + "</td>";
                table += "<td>" + v.CLAVECODIGOBARRAS + "</td>";
                table += "<td>" + v.CLAVEERICO + "</td>";
                table += "<td>" + v.CLAVECLASIFICACION + "</td>";
                table += "<td>" + v.CLAVEAREATERAPEUTICA + "</td>";
                table += "<td>" + v.CLAVEFAMILIA + "</td>";
                table += "<td>" + v.CLAVEPRESENTACION + "</td>";
                table += "<td>" + v.CLAVEPROVEEDOR + "</td>";
                table += "<td>" + v.CLAVEUNIDADMEDIDA + "</td>";
                table += "<td>" + v.COSTO + "</td>";
                table += "<td>" + v.VOLUMEN + "</td>";
                table += "<td>" + v.PESO + "</td>";
                table += "<td>" + v.OSMOLARIDAD + "</td>";
                table += "<td>" + v.DENSIDAD + "</td>";
                table += "<td>" + v.CALORIAS + "</td>";
                table += "<td>" + v.CONCENTRACION + "</td>";
                table += "<td>" + v.DOSISMAXIMAKILOGRAMO + "</td>";
                table += "<td>" + v.DOSISMAXIMAMETRO2 + "</td>";
                table += "<td>" + v.VALENCIA + "</td>";
                table += "<td>" + v.CONFIGURADOR + "</td>";
                table += "<td>" + v.MOSTRARONCO + "</td>";
                table += "<td>" + v.MOSTRARNPT + "</td>";
                table += "<td>" + v.MOSTRARANTI + "</td>";
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
                ]
            });
          
        });
    });


}


function addNew() {
    document.getElementById('frmAdd').reset();
}
function saveNew() {
    if ($("#frmAdd").validationEngine('validate')) {

        $.ajax({
            url: 'src/controller/MedicinesController.php?op=add',
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
        url: 'src/controller/MedicinesController.php?op=getById',
        type: "post",
        contenType: "application/json",
        dataType: 'json',
        data: {"id": id}
    }).done(function (data) {              
        
        $('#idm').val(data.ID);
        $("#medicineKeym").val(data.CLAVEMEDICAMENTO);
        $("#medicinesDescriptionm").val(data.DESCRIPCION);
        $("#medicinesComercialDescriptionm").val(data.DESCCOMER);
        $("#medicinesHealtSectorKeym").val(data.CLAVESECTORSALUD);
        $("#medicinesBarcodeKeym").val(data.CLAVECODIGOBARRAS);
        
        $("#medicinesGenericKeym").val(data.CLAVEERICO);
        $("#medicinesClasificationm").val(data.CLAVERUBROCLASIFICACION+"-"+data.CLAVECLASIFICACION);
        $("#medicinesTherapeuticAream").val(data.CLAVERUBROAREATERAPEUTICA+"-"+data.CLAVEAREATERAPEUTICA);
        $("#medicinesFamilym").val(data.CLAVERUBROFAMILIA+"-"+data.CLAVEFAMILIA);
        $("#medicinesPresentationm").val(data.CLAVERUBROPRESENTACION+"-"+data.CLAVEPRESENTACION);
        $("#medicinesProviderm").val(data.CLAVERUBROPROVEEDOR+"-"+data.CLAVEPROVEEDOR)
        $("#medicinesUnitOfMeasurementm").val(data.CLAVERUBROUNIDADMEDIDA+"-"+data.CLAVEUNIDADMEDIDA)
        
        

        $("#medicinesCostm").val(data.COSTO);
        $("#medicinesVolumem").val(data.VOLUMEN);
        $("#medicinesWeightm").val(data.PESO);
        $("#medicinesOsmolaritym").val(data.OSMOLARIDAD);
        $("#medicinesDensitym").val(data.DENSIDAD);
        $("#medicinesCaloriesm").val(data.CALORIAS);
        $("#medicinesConcentrationm").val(data.CONCENTRACION);
        $("#medicinesMaximumDoseKilogramm").val(data.DOSISMAXIMAKILOGRAMO);
        $("#medicinesMaximumDoseMeter2m").val(data.DOSISMAXIMAMETRO2);
        $("#medicinesValenciam").val(data.VALENCIA);
        $("#medicinesConfiguratorm").val(data.CONFIGURADOR);
        $("#medicinesShowOncom").val(data.MOSTRARONCO);
        $("#medicinesShowNptm").val(data.MOSTRARNPT);
        $("#medicinesShowAntim").val(data.MOSTRARANTI);
        $("#statem").val(data.ESTATUSREGISTRO);

    });
}
function saveUpdated() {
    if ($("#frmUpdate").validationEngine('validate')) {
        $.ajax({
            url: 'src/controller/MedicinesController.php?op=update',
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