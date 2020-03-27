<?php
session_start();
require_once __DIR__ . '../../../src/constants/constants.php';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2><?php echo CATALOG_MAIN_TITLE; ?></h2>                                        
                <div class="clearfix"></div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <select id="catalogNames"  style="width: 100% !important; min-width: 150px"></select>
            </div>
            <span id="addCatalog" style="display: none" class="fa fa-plus-circle iconSuccess" data-toggle="modal" data-target="#modalAdd" onclick="addNew()"></span>
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
                <h4 class="modal-title" id="myModalLabel"><?php echo CATALOG_MODAL_ADD_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmAdd" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogDomain"><?php echo CATALOG_DOMAIN; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogDomain" name="catalogDomain" class="form-control col-md-7 col-xs-12 validate[required, maxSize[100]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogKey"><?php echo CATALOG_KEY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogKey" name="catalogKey" class="form-control col-md-7 col-xs-12 validate[required, maxSize[100]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogDescription"><?php echo CATALOG_DESCRIPTION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogDescription" name="catalogDescription" class="form-control col-md-7 col-xs-12 validate[required, maxSize[300]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogValueEs"><?php echo CATALOG_VALUEES; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogValueEs" name="catalogValueEs" class="form-control col-md-7 col-xs-12 validate[required, maxSize[255]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogValueEn"><?php echo CATALOG_VALUEEN; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogValueEn" name="catalogValueEn" class="form-control col-md-7 col-xs-12 validate[required, maxSize[255]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogOrder"><?php echo CATALOG_ORDER; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogOrder" name="catalogOrder" class="form-control col-md-7 col-xs-12 validate[required, custom[number]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogState"><?php echo USER_STATE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="catalogState" name="catalogState" class="form-control col-md-7 col-xs-12 validate[required]" >
                                <option value=""><?php echo SELECT_EMPTY_VALUE; ?></option>
                                <option selected value="1"><?php echo SELECT_STATE_ACTIVE; ?></option>
                                <option value="2"><?php echo SELECT_STATE_INACTIVE; ?></option>
                            </select>
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
                <h4 class="modal-title" id="myModalLabel"><?php echo USER_MODAL_UPDATE_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmUpdate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogDomainm"><?php echo CATALOG_DOMAIN; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogDomainm" name="catalogDomainm" class="form-control col-md-7 col-xs-12 validate[required, maxSize[100]]" />                            
                            <input type="hidden" id="idCatalogm" name="idCatalogm" class="form-control col-md-7 col-xs-12 validate[required]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogKeym"><?php echo CATALOG_KEY; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogKeym" name="catalogKeym" class="form-control col-md-7 col-xs-12 validate[required, maxSize[100]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogDescriptionm"><?php echo CATALOG_DESCRIPTION; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogDescriptionm" name="catalogDescriptionm" class="form-control col-md-7 col-xs-12 validate[required, maxSize[300]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogValueEsm"><?php echo CATALOG_VALUEES; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogValueEsm" name="catalogValueEsm" class="form-control col-md-7 col-xs-12 validate[required, maxSize[255]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogValueEnm"><?php echo CATALOG_VALUEEN; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogValueEnm" name="catalogValueEnm" class="form-control col-md-7 col-xs-12 validate[required, maxSize[255]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogOrderm"><?php echo CATALOG_ORDER; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="catalogOrderm" name="catalogOrderm" class="form-control col-md-7 col-xs-12 validate[required, custom[number]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogStatem"><?php echo USER_STATE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="catalogStatem" name="catalogStatem" class="form-control col-md-7 col-xs-12 validate[required]" >
                                <option value=""><?php echo SELECT_EMPTY_VALUE; ?></option>
                                <option selected value="1"><?php echo SELECT_STATE_ACTIVE; ?></option>
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
<div class="modal" id="modalResetPassword" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo USER_MODAL_RESET_PASSWORD; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmReset" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"><?php echo USER_PASSWORD; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="idUserr" name="idUserr" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                            <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                        </div>
                    </div>                    
                    <div class="ln_solid"></div>                   
                    <div class="form-group">
                        <div align="center">
                            <span class="fa fa-save iconPrimary" onclick="reset()"></span>
                        </div>
                    </div>
                </form>
            </div>           

        </div>
    </div>
</div>
<div class="modal" id="modalRoles" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo USER_MODAL_ROLES; ?></h4>
            </div>
            <div class="modal-body" id="rolesContainer"></div>
        </div>
    </div>
</div>
<script src="js/app/catalogsFunctions.js" type="text/javascript"></script>
<script src="js/app/catalogs.js" type="text/javascript"></script>
