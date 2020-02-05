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
                <h4 class="modal-title" id="myModalLabel"><?php echo CATALOG_MODAL_ADD_TITLE; ?></h4>
            </div>
            <div class="modal-body">                                
                <form id="frmAdd" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="claveRubro"><?php echo CATALOG_CLAVE_RUBRO; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="claveRubro" name="claveRubro" class="form-control col-md-7 col-xs-12 validate[required, maxSize[8]]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="claveEntidad"><?php echo CATALOG_CLAVE_ENTIDAD; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="claveEntidad" name="claveEntidad" class="form-control col-md-7 col-xs-12 validate[required, maxSize[8]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion"><?php echo CATALOG_DESCRIPCION; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="descripcion" name="descripcion" class="form-control col-md-7 col-xs-12 validate[maxSize[53]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="claveJustificada"><?php echo CATALOG_CLAVE_JUSTIFICADA; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="claveJustificada" name="claveJustificada" class="form-control col-md-7 col-xs-12 validate[maxSize[1]]" />
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorNumerico01"><?php echo CATALOG_CLASIFICADOR_NUMERICO_01; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorNumerico01" name="clasificadorNumerico01" class="form-control col-md-7 col-xs-12 validate[custom[number], maxSize[4]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorNumerico02"><?php echo CATALOG_CLASIFICADOR_NUMERICO_02; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorNumerico02" name="clasificadorNumerico02" class="form-control col-md-7 col-xs-12 validate[custom[number], maxSize[4]]" />
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorAlfanumerico01"><?php echo CATALOG_CLASIFICADOR_ALFANUMERICO_01; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorAlfanumerico01" name="clasificadorAlfanumerico01" class="form-control col-md-7 col-xs-12 validate[ maxSize[7]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorAlfanumerico02"><?php echo CATALOG_CLASIFICADOR_ALFANUMERICO_02; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorAlfanumerico02" name="clasificadorAlfanumerico02" class="form-control col-md-7 col-xs-12 validate[ maxSize[1]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones"><?php echo CATALOG_OBSERVACIONES; ?> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="observaciones" name="observaciones" class="form-control col-md-7 col-xs-12 validate[maxSize[17]]" />
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="claveRubrom"><?php echo CATALOG_CLAVE_RUBRO; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" id="idCatalogm" name="idCatalogom" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                            <input type="text" id="claveRubrom" name="claveRubrom" class="form-control col-md-7 col-xs-12 validate[required, maxSize[8]]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="claveEntidadm"><?php echo CATALOG_CLAVE_ENTIDAD; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="claveEntidadm" name="claveEntidadm" class="form-control col-md-7 col-xs-12 validate[required, maxSize[8]]" />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcionm"><?php echo CATALOG_DESCRIPCION; ?>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="descripcionm" name="descripcionm" class="form-control col-md-7 col-xs-12 validate[maxSize[53]]" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="claveJustificadam"><?php echo CATALOG_CLAVE_JUSTIFICADA; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="claveJustificadam" name="claveJustificadam" class="form-control col-md-7 col-xs-12 validate[maxSize[1]]" />
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorNumerico01m"><?php echo CATALOG_CLASIFICADOR_NUMERICO_01; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorNumerico01m" name="clasificadorNumerico01m" class="form-control col-md-7 col-xs-12 validate[custom[number], maxSize[4]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorNumerico02m"><?php echo CATALOG_CLASIFICADOR_NUMERICO_02; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorNumerico02m" name="clasificadorNumerico02m" class="form-control col-md-7 col-xs-12 validate[custom[number], maxSize[4]]" />
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorAlfanumerico01m"><?php echo CATALOG_CLASIFICADOR_ALFANUMERICO_01; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorAlfanumerico01m" name="clasificadorAlfanumerico01m" class="form-control col-md-7 col-xs-12 validate[ maxSize[7]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificadorAlfanumerico02m"><?php echo CATALOG_CLASIFICADOR_ALFANUMERICO_02; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="clasificadorAlfanumerico02m" name="clasificadorAlfanumerico02m" class="form-control col-md-7 col-xs-12 validate[ maxSize[1]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacionesm">
                          <?php echo CATALOG_OBSERVACIONES; ?> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="observacionesm" name="observacionesm" class="form-control col-md-7 col-xs-12 validate[maxSize[17]]" />
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estatusRegistrom"><?php echo USER_STATE; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="estatusRegistrom" name="estatusRegistrom" class="form-control col-md-7 col-xs-12 validate[required]" >
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