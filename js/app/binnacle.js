$(document).ready(function(){
    
    $("#frmBinnacleSearch").validationEngine();

    $("#binnacleDate").datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"dd-mm-yy"
    });    
    
    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByDomains",
        type: 'post',
        dataType: 'json',
        data:{"domains": "'CAT_TABLES'"}
    }).done(function (data) {        
        var select ="<option value=''></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.IDCATALOG+"-"+v.CATALOGKEY+"-"+v.DOMAIN+"'>"+v.VALUEEN+"</option>";
        });
        $("#catalogTable").html(select);
    });

    $.ajax({
        url: "src/controller/CatalogsController.php?op=getByDomains",
        type: 'post',
        dataType: 'json',
        data:{"domains": "'CAT_CRUD'"}
    }).done(function (data) {        
        var select ="<option value=''></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.IDCATALOG+"-"+v.CATALOGKEY+"-"+v.DOMAIN+"'>"+v.VALUEEN+"</option>";
        });
        $("#catalogOperations").html(select);
    });

    $.ajax({
        url: "src/controller/UsersController.php?op=getAllUsers",
        type: 'post',
        dataType: 'json'       
    }).done(function (data) {        
        var select ="<option value=''></option>";
        $.each(data, function(i, v){
            console.log(v);
            select += "<option value='"+v.IDUSER+"'>"+v.NAME+" "+v.LASTNAME+" "+v.LASTNAME2+"</option>";
        });
        $("#user").html(select);
    });

});