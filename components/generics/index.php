<?php
session_start();
require_once __DIR__ . '../../../src/constants/constants.php';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2><?php echo GENERIC_MAIN_TITLE; ?></h2>                                        
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
                <h4 class="modal-title" id="myModalLabel"><?php echo GENERIC_MODAL_ADD_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmAdd" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericKey"><?php echo GENERIC_GENERIC_KEY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="genericKey" name="genericKey" class="form-control col-md-7 col-xs-12 validate[required,maxSize[18]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericName"><?php echo GENERIC_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="genericName" name="genericName" class="form-control col-md-7 col-xs-12 validate[required]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericShortName"><?php echo GENERIC_SHORT_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="genericShortName" name="genericShortName" class="form-control col-md-7 col-xs-12 validate[required,maxSize[20]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericType"><?php echo GENERIC_TYPE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="genericType" name="genericType" class="form-control col-md-7 col-xs-12 validate[required]" >
                                
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericChange"><?php echo GENERIC_CHANGE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="genericChange" name="genericChange" class="form-control col-md-7 col-xs-12 validate[required,maxSize[2]]" /> 
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
                <h4 class="modal-title" id="myModalLabel"><?php echo GENERIC_MODAL_UPDATE_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmUpdate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericKeym"><?php echo GENERIC_GENERIC_KEY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="idm" name="idm" class="form-control col-md-7 col-xs-12 validate[required]" />
                            <input type="text" id="genericKeym" name="genericKeym" class="form-control col-md-7 col-xs-12 validate[required,maxSize[18]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericNamem"><?php echo GENERIC_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="genericNamem" name="genericNamem" class="form-control col-md-7 col-xs-12 validate[required]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericShortNamem"><?php echo GENERIC_SHORT_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="genericShortNamem" name="genericShortNamem" class="form-control col-md-7 col-xs-12 validate[required,maxSize[20]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericTypem"><?php echo GENERIC_TYPE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="genericTypem" name="genericTypem" class="form-control col-md-7 col-xs-12 validate[required]" ></select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genericChangem"><?php echo GENERIC_CHANGE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="genericChangem" name="genericChangem" class="form-control col-md-7 col-xs-12 validate[required,maxSize[2]]" /> 
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
<script src="js/app/genericsFunctions.js" type="text/javascript"></script>
<script src="js/app/generics.js" type="text/javascript"></script>