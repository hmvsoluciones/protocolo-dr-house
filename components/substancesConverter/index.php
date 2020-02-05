<?php
session_start();

require_once __DIR__ . '../../../src/constants/constants.php';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2><?php echo DOCTOR_MAIN_TITLE; ?></h2>                                        
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
                <h4 class="modal-title" id="myModalLabel"><?php echo DOCTOR_MODAL_ADD_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmAdd" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="doctorRegistration"><?php echo DOCTOR_REGISTRATION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="doctorRegistration" name="doctorRegistration" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfc"><?php echo DOCTOR_RFC; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="rfc" name="rfc" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curp"><?php echo DOCTOR_CURP; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="curp" name="curp" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profesionalLicense"><?php echo DOCTOR_PROFESSIONAL_LICENSE; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="profesionalLicense" name="profesionalLicense" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo DOCTOR_NAME; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName"><?php echo DOCTOR_LASTNAME; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastName" name="lastName" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName2"><?php echo DOCTOR_LASTNAME2; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastName2" name="lastName2" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="specialityKey"><?php echo DOCTOR_SPECIALITY_KEY; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="specialityKey" name="specialityKey" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"><?php echo DOCTOR_PHONE; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="phone" name="phone" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observations"><?php echo DOCTOR_OBSERVATIONS; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="observations" name="observations" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admisionDate"><?php echo DOCTOR_ADMISION_DATE; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="admisionDate" name="admisionDate" readonly class="col-md-3 col-xs-12 validate[required]" /> 
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
                <h4 class="modal-title" id="myModalLabel"><?php echo DOCTOR_MODAL_UPDATE_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmUpdate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="doctorRegistration"><?php echo DOCTOR_REGISTRATION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="idm" name="idm" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                            <input type="text" id="doctorRegistrationm" name="doctorRegistrationm" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rfcm"><?php echo DOCTOR_RFC; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="rfcm" name="rfcm" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curpm"><?php echo DOCTOR_CURP; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="curpm" name="curpm" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profesionalLicensem"><?php echo DOCTOR_PROFESSIONAL_LICENSE; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="profesionalLicensem" name="profesionalLicensem" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namem"><?php echo DOCTOR_NAME; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="namem" name="namem" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastNamem"><?php echo DOCTOR_LASTNAME; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastNamem" name="lastNamem" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName2m"><?php echo DOCTOR_LASTNAME2; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastName2m" name="lastName2m" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="specialityKeym"><?php echo DOCTOR_SPECIALITY_KEY; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                            <select id="specialityKeym" name="specialityKeym" class="form-control col-md-7 col-xs-12 validate[required]" ></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phonem"><?php echo DOCTOR_PHONE; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="phonem" name="phonem" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observationsm"><?php echo DOCTOR_OBSERVATIONS; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="observationsm" name="observationsm" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admisionDatem"><?php echo DOCTOR_ADMISION_DATE; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="admisionDatem" name="admisionDatem" readonly class="col-md-3 col-xs-12 validate[required]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="statem"><?php echo DOCTOR_STATE; ?> <span class="required">*</span>
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
<script src="js/app/substancesConverterFunctions.js" type="text/javascript"></script>
<script src="js/app/substancesConverter.js" type="text/javascript"></script>