function getCatalogNames() {

    var selectBody = "<option value=''></option>";
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getCatalogNames",
        type: 'get',
        contentType:"application/json",
        dataType: 'json'
    }).done(function (data) {        
        
        $.each(data, function(i, v){            
            selectBody += "<option value='"+v.DOMAIN+"'>"+v.DOMAIN+"</option>";
        });
        $("#catalogNames").html(selectBody).select2({theme: "classic"});
    });

    

}
function addNew() {
    document.getElementById('frmAdd').reset();
    $("#catalogDomain").val($("#catalogNames").val()).prop("readonly", "readonly");
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
        
        $("#catalogDomainm").val(data.DOMAIN).prop("readonly", "readonly");
        $("#catalogKeym").val(data.CATALOGKEY).prop("readonly", "readonly");
        $("#catalogDescriptionm").val(data.DESCRIPTION);
        $("#catalogValueEsm").val(data.VALUEES);
        $("#catalogValueEnm").val(data.VALUEEN);
        $("#catalogOrderm").val(data.CATALOGORDER);
        $("#catalogStatem").val(data.STATE);
        $("#idCatalogm").val(data.IDCATALOG);
        
        
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
function getAllCatalogData (domain) {

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
            data:{"domain": domain },
            dataType: 'json'
        }).done(function (data) {

            table += "<tbody>";
            $.each(data, function (i, v) {                
                var state = (v.STATE === "1") ? "ACTIVO" : "INACTIVO";                
                table += "<tr>";    
                table += "<td><span class='fa fa-pencil iconWarning' onclick='update(" + v.IDCATALOG + ")'></span></td>";                
                table += "<td>" + v.CATALOGKEY + "</td>";
                table += "<td>" + v.VALUEES + "</td>";
                table += "<td>" + v.VALUEEN + "</td>";
                table += "<td>" + v.CATALOGORDER + "</td>";
                table += "<td>" + v.DESCRIPTION + "</td>";                
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

