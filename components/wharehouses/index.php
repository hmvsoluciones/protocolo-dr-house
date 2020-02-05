<?php
session_start();
require_once __DIR__ . '../../../src/constants/constants.php';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2><?php echo WAREHOUSE_MAIN_TITLE; ?></h2>                                        
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
                <h4 class="modal-title" id="myModalLabel"><?php echo WAREHOUSE_MODAL_ADD_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmAdd" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyWarehouses"><?php echo WAREHOUSES_KEY_WAREHOUSES; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="keyWarehouses" name="keyWarehouses" class="form-control col-md-7 col-xs-12 validate[required,maxSize[8]]" />                            
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="realName"><?php echo WAREHOUSES_REAL_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="realName" name="realName" class="form-control col-md-7 col-xs-12 validate[required,maxSize[40]]" />                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyAcendep"><?php echo WAREHOUSES_KEY_ACENDEP; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="keyAcendep" name="keyAcendep" class="form-control col-md-7 col-xs-12 validate[required,maxSize[50]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo WAREHOUSES_TIP; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="type" id="totalEntries" name="type" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyResponsabe"><?php echo WAREHOUSES_KEY_RESPOSABLE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="keyResponsabe" name="keyResponsabe" class="form-control col-md-7 col-xs-12 validate[required,maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obs"><?php echo WAREHOUSES_OBS; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="obs" name="obs" class="form-control col-md-7 col-xs-12 validate[required]" /> 
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
                <h4 class="modal-title" id="myModalLabel"><?php echo WAREHOUSE_MODAL_UPDATE_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmUpdate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyWarehousesm"><?php echo WAREHOUSES_KEY_WAREHOUSES; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="idm" name="idm" class="form-control col-md-7 col-xs-12 validate[required]" /> 
                            <input type="text" id="keyWarehousesm" name="keyWarehousesm" class="form-control col-md-7 col-xs-12 validate[required,maxSize[8]]" />
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="realNamem"><?php echo WAREHOUSES_REAL_NAME; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="realNamem" name="realNamem" class="form-control col-md-7 col-xs-12 validate[required,maxSize[40]]" />             
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyAcendepm"><?php echo WAREHOUSES_KEY_ACENDEP; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="keyAcendepm" name="keyAcendepm" class="form-control col-md-7 col-xs-12 validate[required,maxSize[50]]" />                          
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="typem"><?php echo WAREHOUSES_TIP; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="typem" name="typem" class="form-control col-md-7 col-xs-12 validate[required,maxSize[1]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyResponsabem"><?php echo WAREHOUSES_KEY_RESPOSABLE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="keyResponsabem" name="keyResponsabem" class="form-control col-md-7 col-xs-12 validate[required,maxSize[10]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obsm"><?php echo WAREHOUSES_OBS; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="obsm" name="obsm" class="form-control col-md-7 col-xs-12 validate[required]" /> 
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

<script src="js/app/warehousesFunctions.js" type="text/javascript"></script>
<script src="js/app/warehouses.js" type="text/javascript"></script>