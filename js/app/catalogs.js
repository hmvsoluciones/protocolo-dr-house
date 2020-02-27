$(document).ready(function(){
    
    getCatalogNames();
    
    
    
    $("#frmAdd").validationEngine();


    $("#catalogNames").change(function(){
        if($(this).val() !== ""){
            $("#addCatalog").show('slow');
            $("#claveRubro").val($(this).val());
            getAllCatalogData($(this).val());
        } else {
            $("#addCatalog").hide('slow');
            $("#claveRubro").val("");            
        }
    });
    
});