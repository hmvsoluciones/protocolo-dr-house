function getCatalogNames() {

    var selectBody = "<option value=''></option>";
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getCatalogNames",
        type: 'get',
        contentType:"application/json",
        dataType: 'json'
    }).done(function (data) {        
        
        $.each(data, function(i, v){            
            selectBody += "<option value='"+v.NombreCatalogoCATS+"'>"+v.NombreCatalogoCATS+"</option>";
        });
        $("#catalogNames").html(selectBody).select2({theme: "classic"});
    });

    

}
function addNew() {
    document.getElementById('frmAdd').reset();
    $("#claveRubro").val($("#catalogNames").val()).prop("readonly", "readonly");
}
function saveNew() {
    if ($("#frmAdd").validationEngine('validate')) {

        $.ajax({
            url: 'src/controller/CatalogsController.php?op=add',
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
                getAllCatalogData($("#catalogNames").val());
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
        url: 'src/controller/CatalogsController.php?op=getById',
        type: "post",
        contenType: "application/json",
        dataType: 'json',
        data: {"id": id}
    }).done(function (data) {
        
        $("#clasificadorAlfanumerico01m").val(data.ClasificadorAlfanumerico01CATS);
        $("#clasificadorAlfanumerico02m").val(data.ClasificadorAlfanumerico02CATS);
        $("#clasificadorNumerico01m").val(data.ClasificadorNumerico01CATS);
        $("#clasificadorNumerico02m").val(data.ClasificadorNumerico02CATS);
        $("#claveEntidadm").val(data.ClaveEntidadCATS);
        $("#claveJustificadam").val(data.ClaveJustificadaCATS);
        $("#claveRubrom").val(data.ClaveRubroCATS);
        $("#descripcionm").val(data.DescripcionCATS);
        $("#estatusRegistrom").val(data.EstatusRegistroCATS);
        $("#observacionesm").val(data.ObservacionesCATS);
        $("#idCatalogm").val(data.idCatalogo);
        
        
    });
}
function saveUpdated() {
    if ($("#frmUpdate").validationEngine('validate')) {
        console.log($("#frmUpdate").serialize());
        $.ajax({
            url: 'src/controller/CatalogsController.php?op=update',
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
                getAllCatalogData($("#catalogNames").val());
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
function getAllCatalogData (rubro) {

    var table = "<table id='reportTable' class='table table-hover'>";
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getAllTableHeader",
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
            url: "src/controller/CatalogsController.php?op=getAllCatalogData",
            type: 'post',
            data:{"rubro": rubro },
            dataType: 'json'
        }).done(function (data) {

            table += "<tbody>";
            $.each(data, function (i, v) {
                console.log(v);
                var state = (v.EstatusRegistroCATS === "1") ? "ACTIVO" : "INACTIVO";
                var userUpdate=(v.USERUPDATE !== null)?v.USERUPDATE: "";
                var dateUpdate=(v.FechaCambioCATS !== null)?v.FechaCambioCATS: "";
                v.ClasificadorNumerico01CATS = (v.ClasificadorNumerico01CATS !== null)?v.ClasificadorNumerico01CATS:"";
                v.ClasificadorNumerico02CATS = (v.ClasificadorNumerico02CATS !== null)?v.ClasificadorNumerico02CATS:"";
                table += "<tr>";    
                table += "<td><span class='fa fa-pencil iconWarning' onclick='update(" + v.idCatalogo + ")'></span></td>";                
                table += "<td>" + v.ClaveRubroCATS + "</td>";
                table += "<td>" + v.ClaveEntidadCATS + "</td>";
                table += "<td>" + v.DescripcionCATS + "</td>";
                table += "<td>" + v.ClaveJustificadaCATS + "</td>";
                table += "<td>" + v.ClasificadorNumerico01CATS + "</td>";
                table += "<td>" + v.ClasificadorNumerico02CATS + "</td>";
                table += "<td>" + v.ClasificadorAlfanumerico01CATS + "</td>";
                table += "<td>" + v.ClasificadorAlfanumerico02CATS + "</td>";
                table += "<td>" + v.ObservacionesCATS + "</td>";
                table += "<td>" + v.USERALTA + "</td>";
                table += "<td>" + v.FechaAltaCATS + "</td>";
                table += "<td>" + userUpdate + "</td>";
                table += "<td>" + dateUpdate + "</td>";
                
                
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
                ]
            });
        });
    });


}

