<?php
session_start();

require_once __DIR__ . '../../../src/constants/constants.php';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2><?php echo MEDICINES_MAIN_TITLE; ?></h2>                                        
                <div class="clearfix"></div>
            </div>
            <span class="fa fa-plus-circle iconSuccess" data-toggle="modal" data-target="#modalAdd" onclick="addNew()"></span>
            <br />
            <br />
            <hr />
            <div id="reportContainer" class="table-responsive"></div>
        </div>
    </div>
</div>
<div class="modal" id="modalAdd"  role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo MEDICINES_MODAL_ADD_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmAdd" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicineKey"><?php echo MEDICINES_KEY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicineKey" name="medicineKey" class="form-control col-md-7 col-xs-12 validate[required,maxSize[20]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesDescription"><?php echo MEDICINES_DESCRIPTION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesDescription" name="medicinesDescription" class="form-control col-md-7 col-xs-12 validate[required,maxSize[50]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesComercialDescription"><?php echo MEDICINES_COMERCIAL_DESCRIPTION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesComercialDescription" name="medicinesComercialDescription" class="form-control col-md-7 col-xs-12 validate[required,maxSize[50]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesHealtSectorKey"><?php echo MEDICINES_HEALT_SECTOR_KEY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesHealtSectorKey" name="medicinesHealtSectorKey" class="form-control col-md-7 col-xs-12 validate[required,maxSize[14]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesBarcodeKey"><?php echo MEDICINES_BARCODE_KEY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesBarcodeKey" name="medicinesBarcodeKey" class="form-control col-md-7 col-xs-12 validate[required,maxSize[14]]" /> 
                        </div>
                    </div>                                     
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesGenericKey"><?php echo MEDICINES_GENERIC_KEY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesGenericKey" name="medicinesGenericKey" style="width:100%;" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesClasification"><?php echo MEDICINES_CLASIFICATION; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesClasification" name="medicinesClasification" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesTherapeuticArea"><?php echo MEDICINES_THERAPEUTIC_AREA; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesTherapeuticArea" name="medicinesTherapeuticArea" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesFamily"><?php echo MEDICINES_FAMILY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesFamily" name="medicinesFamily" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesPresentation"><?php echo MEDICINES_PRESENTATION; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesPresentation" name="medicinesPresentation" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesProvider"><?php echo MEDICINES_PROVIDER; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesProvider" name="medicinesProvider" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesUnitOfMeasurement"><?php echo MEDICINES_UNIT_OF_MEASUREMENT; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesUnitOfMeasurement" name="medicinesUnitOfMeasurement" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>                                                           
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesCost"><?php echo MEDICINES_COST; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesCost" name="medicinesCost" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesVolume"><?php echo MEDICINES_VOLUME; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesVolume" name="medicinesVolume" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesWeight"><?php echo MEDICINES_WEIGHT; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesWeight" name="medicinesWeight" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesOsmolarity"><?php echo MEDICINES_OSMOLARITY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesOsmolarity" name="medicinesOsmolarity" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesDensity"><?php echo MEDICINES_DENSITY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesDensity" name="medicinesDensity" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesCalories"><?php echo MEDICINES_CALORIES; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesCalories" name="medicinesCalories" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesConcentration"><?php echo MEDICINES_CONCENTRATION; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesConcentration" name="medicinesConcentration" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesMaximumDoseKilogram"><?php echo MEDICINES_MAXIMUM_DOSE_KILOGRAM; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesMaximumDoseKilogram" name="medicinesMaximumDoseKilogram" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesMaximumDoseMeter2"><?php echo MEDICINES_MAXIMUM_DOSE_METER_2; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesMaximumDoseMeter2" name="medicinesMaximumDoseMeter2" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesValencia"><?php echo MEDICINES_VALENCIA; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesValencia" name="medicinesValencia" class="form-control col-md-7 col-xs-12 validate[required,maxSize[3]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesConfigurator"><?php echo MEDICINES_CONFIGURATOR; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesConfigurator" name="medicinesConfigurator" class="form-control col-md-7 col-xs-12 validate[required,maxSize[6]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesShowOnco"><?php echo MEDICINES_SHOW_ONCO; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesShowOnco" name="medicinesShowOnco" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesShowNpt"><?php echo MEDICINES_SHOW_NPT; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesShowNpt" name="medicinesShowNpt" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesShowAnti"><?php echo MEDICINES_SHOW_ANTI; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesShowAnti" name="medicinesShowAnti" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" /> 
                        </div>
                    </div>
                    <div class="ln_solid"></div>                   
                    <div class="form-group">
                        <div align="center">
                            <span class="fa fa-save iconPrimary" onclick="saveNew()"></span>
                        </div>
                    </div>
                </form>
            </div>           

        </div>
    </div>
</div>
<div class="modal" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo MEDICINES_MODAL_UPDATE_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmUpdate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicineKeym"><?php echo MEDICINES_KEY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="idm" name="idm" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                            <input type="text" id="medicineKeym" name="medicineKeym" class="form-control col-md-7 col-xs-12 validate[required,maxSize[20]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesDescriptionm"><?php echo MEDICINES_DESCRIPTION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesDescriptionm" name="medicinesDescriptionm" class="form-control col-md-7 col-xs-12 validate[required,maxSize[50]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesComercialDescriptionm"><?php echo MEDICINES_COMERCIAL_DESCRIPTION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesComercialDescriptionm" name="medicinesComercialDescriptionm" class="form-control col-md-7 col-xs-12 validate[required,maxSize[50]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesHealtSectorKeym"><?php echo MEDICINES_HEALT_SECTOR_KEY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesHealtSectorKeym" name="medicinesHealtSectorKeym" class="form-control col-md-7 col-xs-12 validate[required,maxSize[14]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesBarcodeKeym"><?php echo MEDICINES_BARCODE_KEY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesBarcodeKeym" name="medicinesBarcodeKeym" class="form-control col-md-7 col-xs-12 validate[required,maxSize[14]]" /> 
                        </div>
                    </div>                                     
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesGenericKeym"><?php echo MEDICINES_GENERIC_KEY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesGenericKeym" name="medicinesGenericKeym" style="width:100%;" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesClasificationm"><?php echo MEDICINES_CLASIFICATION; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesClasificationm" name="medicinesClasificationm" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesTherapeuticAream"><?php echo MEDICINES_THERAPEUTIC_AREA; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesTherapeuticAream" name="medicinesTherapeuticAream" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesFamilym"><?php echo MEDICINES_FAMILY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesFamilym" name="medicinesFamilym" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesPresentationm"><?php echo MEDICINES_PRESENTATION; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesPresentationm" name="medicinesPresentationm" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesProviderm"><?php echo MEDICINES_PROVIDER; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesProviderm" name="medicinesProviderm" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesUnitOfMeasurementm"><?php echo MEDICINES_UNIT_OF_MEASUREMENT; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="medicinesUnitOfMeasurementm" name="medicinesUnitOfMeasurementm" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>                                                           
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesCostm"><?php echo MEDICINES_COST; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesCostm" name="medicinesCostm" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesVolumem"><?php echo MEDICINES_VOLUME; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesVolumem" name="medicinesVolumem" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesWeightm"><?php echo MEDICINES_WEIGHT; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesWeightm" name="medicinesWeightm" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesOsmolaritym"><?php echo MEDICINES_OSMOLARITY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesOsmolaritym" name="medicinesOsmolaritym" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesDensitym"><?php echo MEDICINES_DENSITY; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesDensitym" name="medicinesDensitym" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesCaloriesm"><?php echo MEDICINES_CALORIES; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesCaloriesm" name="medicinesCaloriesm" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesConcentrationm"><?php echo MEDICINES_CONCENTRATION; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesConcentrationm" name="medicinesConcentrationm" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesMaximumDoseKilogramm"><?php echo MEDICINES_MAXIMUM_DOSE_KILOGRAM; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesMaximumDoseKilogramm" name="medicinesMaximumDoseKilogramm" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesMaximumDoseMeter2"><?php echo MEDICINES_MAXIMUM_DOSE_METER_2; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesMaximumDoseMeter2m" name="medicinesMaximumDoseMeter2m" class="form-control col-md-7 col-xs-12 validate[required,custom[number],maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesValenciam"><?php echo MEDICINES_VALENCIA; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesValenciam" name="medicinesValenciam" class="form-control col-md-7 col-xs-12 validate[required,maxSize[3]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesConfiguratorm"><?php echo MEDICINES_CONFIGURATOR; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesConfiguratorm" name="medicinesConfiguratorm" class="form-control col-md-7 col-xs-12 validate[required,maxSize[6]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesShowOncom"><?php echo MEDICINES_SHOW_ONCO; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesShowOncom" name="medicinesShowOncom" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesShowNptm"><?php echo MEDICINES_SHOW_NPT; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesShowNptm" name="medicinesShowNptm" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicinesShowAntim"><?php echo MEDICINES_SHOW_ANTI; ?><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="medicinesShowAntim" name="medicinesShowAntim" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="statem"><?php echo MEDICINES_STATE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="statem" name="statem" class="form-control col-md-7 col-xs-12 validate[required]" >
                                <option value=""><?php echo SELECT_EMPTY_VALUE; ?></option>
                                <option value="1"><?php echo SELECT_STATE_ACTIVE; ?></option>
                                <option value="2"><?php echo SELECT_STATE_INACTIVE; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>                   
                    <div class="form-group">
                        <div align="center">
                            <span class="fa fa-save iconPrimary" onclick="saveUpdated()"></span>
                        </div>
                    </div>
                </form>
            </div>           

        </div>
    </div>
</div>
<script src="js/app/medicinesFunctions.js" type="text/javascript"></script>
<script src="js/app/medicines.js" type="text/javascript"></script>