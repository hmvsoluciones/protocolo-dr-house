$(document).ready(function(){
    getAllRecords();
    
    $("#frmAdd").validationEngine();
       
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByCvesRubros",
        type: 'post',
        dataType: 'json',
        data:{"rubros": "'CLASMEDT'"}
    }).done(function (data) {        
        var select ="<option value='seleccione'></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.ClaveRubroCATS+"-"+v.ClaveEntidadCATS+"'>"+v.DescripcionCATS+"</option>";
        });
        $("#medicinesClasification, #medicinesClasificationm").html(select);
    });
    
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByCvesRubros",
        type: 'post',
        dataType: 'json',
        data:{"rubros": "'AREATERA'"}
    }).done(function (data) {        
        var select ="<option value='seleccione'></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.ClaveRubroCATS+"-"+v.ClaveEntidadCATS+"'>"+v.DescripcionCATS+"</option>";
        });
        $("#medicinesTherapeuticArea, #medicinesTherapeuticAream").html(select);
    });
    
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByCvesRubros",
        type: 'post',
        dataType: 'json',
        data:{"rubros": "'FAMILIAS'"}
    }).done(function (data) {        
        var select ="<option value='seleccione'></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.ClaveRubroCATS+"-"+v.ClaveEntidadCATS+"'>"+v.DescripcionCATS+"</option>";
        });
        $("#medicinesFamily, #medicinesFamilym").html(select);
    });
    
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByCvesRubros",
        type: 'post',
        dataType: 'json',
        data:{"rubros": "'PRESENTA'"}
    }).done(function (data) {        
        var select ="<option value='seleccione'></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.ClaveRubroCATS+"-"+v.ClaveEntidadCATS+"'>"+v.DescripcionCATS+"</option>";
        });
        $("#medicinesPresentation, #medicinesPresentationm").html(select);
    });
    
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByCvesRubros",
        type: 'post',
        dataType: 'json',
        data:{"rubros": "'LABORATO'"}
    }).done(function (data) {        
        var select ="<option value='seleccione'></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.ClaveRubroCATS+"-"+v.ClaveEntidadCATS+"'>"+v.DescripcionCATS+"</option>";
        });
        $("#medicinesProvider, #medicinesProviderm").html(select);
    });
    
    
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByCvesRubros",
        type: 'post',
        dataType: 'json',
        data:{"rubros": "'TIPOUNID'"}
    }).done(function (data) {        
        var select ="<option value=''></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.ClaveRubroCATS+"-"+v.ClaveEntidadCATS+"'>"+v.DescripcionCATS+"</option>";
        });
        $("#medicinesUnitOfMeasurement, #medicinesUnitOfMeasurementm").html(select);
    });
    
    
    $.ajax({
        url: "src/controller/GenericsController.php?op=getAllData",
        type: 'get',
        dataType: 'json'
    }).done(function (data) {

        var select ="<option value=''></option>";
        $.each(data, function (i, v) {
            select += "<option value='"+v.CLAVEGERICO+"'>"+v.NOMBRE+"</option>";                                
        });

        $("#medicinesGenericKey, #medicinesGenericKeym").html(select)/*.select2({theme: "classic"})*/;
    });  
});