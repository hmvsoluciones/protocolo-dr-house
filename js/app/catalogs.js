$(document).ready(function(){
    
    getCatalogNames();
    
    
    
    $("#frmAdd").validationEngine();


    $("#catalogNames").change(function(){
        if($(this).val() !== ""){
            $("#addCatalog").show('slow');
            $("#catalogKey").val($(this).val());
            getAllCatalogData($(this).val());
        } else {
            $("#addCatalog").hide('slow');
            $("#catalogKey").val("");            
        }
    });
    
});