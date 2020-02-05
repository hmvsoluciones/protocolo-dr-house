$(document).ready(function(){
    getAllRecords();
    
    $("#frmAdd").validationEngine();
    
    $("#admisionDate,#admisionDatem").datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"dd-mm-yy"
    });
    
    
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByCvesRubros",
        type: 'post',
        dataType: 'json',
        data:{"rubros": "'TIPOGENE'"}
    }).done(function (data) {        
        var select ="<option value=''></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.ClaveRubroCATS+"-"+v.ClaveEntidadCATS+"'>"+v.DescripcionCATS+"</option>";
        });
        $("#genericType, #genericTypem").html(select);
    });

});