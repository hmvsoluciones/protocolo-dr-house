<?php
session_start();

require_once __DIR__ . '../../../src/constants/constants.php';
?>
<!-- Json Viwer -->
<link href= "js/json-viwer/style.css" rel="stylesheet" />
<script src="js/json-viwer/json-viwer.js"></script>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height:600px;">
            <div class="x_title">
                <h2><?php echo BINNACLE_MAIN_TITLE; ?></h2>                                        
                <div class="clearfix"></div>
            </div>

            <form class="form-inline" id="frmBinnacleSearch">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="binnacleDate" >Fecha</label>
                    <input type="text" readonly name="binnacleDate" size="10"  id="binnacleDate" placeholder="" class="validate[required]">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="catalogTable">Table</label>
                    <select class="form-control" name="catalogTable" id="catalogTable"></select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="catalogOperation">operacion</label>
                    <select class="form-control" name="catalogOperations" id="catalogOperations"></select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="usuario">User</label>
                    <select class="form-control" name="user" id="user"></select>
                </div>
                <span class="fa fa-search iconSuccess" data-toggle="modal" onclick="binnacleSearch()"></span>
            </form>            
            <br />
            <br />
            <hr />
            <div id="reportContainer" class="table-responsive"></div>
        </div>
    </div>
</div>
<script src="js/app/binnacleFunctions.js" type="text/javascript"></script>
<script src="js/app/binnacle.js" type="text/javascript"></script>