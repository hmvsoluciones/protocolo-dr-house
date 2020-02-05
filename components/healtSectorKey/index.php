<?php
session_start();

require_once __DIR__ . '../../../src/constants/constants.php';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2><?php echo HEALT_SECTOR_KEY_MAIN_TITLE; ?></h2>                                        
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
<div class="modal" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo HEALT_SECTOR_KEY_MODAL_ADD_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmAdd" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKey"><?php echo HEALT_SECTOR_KEY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="healtSectorKey" name="healtSectorKey" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKeyPresentation"><?php echo HEALT_SECTOR_KEY_PRESENTATION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="healtSectorKeyPresentation" name="healtSectorKeyPresentation" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKeyPresentationQuantity"><?php echo HEALT_SECTOR_KEY_PRESENTATION_QUANTITY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="healtSectorKeyPresentationQuantity" name="healtSectorKeyPresentationQuantity" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKeyUMQuantity"><?php echo HEALT_SECTOR_KEY_UM_QUANTITY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="healtSectorKeyUMQuantity" name="healtSectorKeyUMQuantity" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKeyMeasutreQuantity"><?php echo HEALT_SECTOR_KEY_MEASURE_QUANTITY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="healtSectorKeyMeasutreQuantity" name="healtSectorKeyMeasutreQuantity" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKeyFamily"><?php echo HEALT_SECTOR_KEY_FAMILY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="healtSectorKeyFamily" name="healtSectorKeyFamily" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKeyUnitMeasutre"><?php echo HEALT_SECTOR_KEY_KEY_UNIT_MEASURE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="healtSectorKeyUnitMeasutre" name="healtSectorKeyUnitMeasutre" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healtSectorKeyDescription"><?php echo HEALT_SECTOR_KEY_DESCRIPTION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="healtSectorKeyDescription" name="healtSectorKeyDescription" class="form-control col-md-7 col-xs-12 validate[required]" />                            
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
                <h4 class="modal-title" id="myModalLabel"><?php echo HEALT_SECTOR_KEY_MODAL_UPDATE_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmUpdate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namem"><?php echo USER_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="idUserm" name="idUserm" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                            <input type="text" id="namem" name="namem" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastNamem"><?php echo USER_LAST_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastNamem" name="lastNamem" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName2m"><?php echo USER_LAST_NAME2; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastName2m" name="lastName2m" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mailm"><?php echo USER_MAIL; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="mailm" name="mailm" class="form-control col-md-7 col-xs-12 validate[required, custom[email]]" />
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userm"><?php echo USER_USER; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="userm" name="userm" readonly class="form-control col-md-7 col-xs-12 validate[required]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userm"><?php echo USER_STATE; ?> <span class="required">*</span>
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
<script src="js/app/healtSectorKeyFunctions.js" type="text/javascript"></script>
<script src="js/app/healtSectorKey.js" type="text/javascript"></script>