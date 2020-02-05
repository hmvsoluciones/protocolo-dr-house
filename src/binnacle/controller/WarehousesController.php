<?php

session_start();

require_once '../model/LoginRequest.php';
require_once '../util/Util.php';
require_once '../util/impl/UtilImpl.php';

require_once '../connection/Connection.php';
require_once '../login/dao/LoginDao.php';
require_once '../login/dao/LoginDaoImpl.php';
require_once '../login/service/LoginService.php';
require_once '../login/service/LoginServiceImpl.php';
require_once '../warehouses/dao/WarehousesDao.php';
require_once '../warehouses/dao/WarehousesDaoImpl.php';
require_once '../warehouses/service/WarehousesService.php';
require_once '../warehouses/service/WarehousesServiceImpl.php';
require_once '../binnacle/dao/BinnacleDao.php';
require_once '../binnacle/dao/BinnacleDaoImpl.php';


require_once __DIR__ . '../../../src/constants/constants.php';

$op = filter_input(INPUT_GET, 'op');

$warehousesService = new WarehousesServiceImpl();
$loginService = new LoginServiceImpl();



switch ($op) {
    case "getTableHeader":
        echo json_encode(WAREHAUSES_TABLE_HEADER);
        break;
    case "getAllData":

        $response = $warehousesService->getAllData();
        
        echo json_encode($response);

        break;
    case "add":

        //$especialidad = explode("-", filter_input(INPUT_POST, 'specialityKey'));

        $data['id'] = filter_input(INPUT_POST, 'id');
        $data['claveAlmacen'] = filter_input(INPUT_POST, 'keyWarehouses');
        $data['nombreReal'] = filter_input(INPUT_POST, 'realName');
        $data['claveAcendep'] = filter_input(INPUT_POST, 'keyAcendep');
        $data['tipo'] = filter_input(INPUT_POST, 'type');
        $data['claveResponsable'] = filter_input(INPUT_POST, 'keyResponsabe');
        $data['observaciones'] = filter_input(INPUT_POST, 'obs');

        

        if ($warehousesService->add($data)) {
            echo json_encode(array("state" => true, "message" => WAREHOUSES_ADD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => WAREHOUSES_ADD_ERROR));
        }
        break;
    case "update":

        $data['id'] = filter_input(INPUT_POST, 'idm');
        $data['claveAlmacen'] = filter_input(INPUT_POST, 'keyWarehousesm');
        $data['nombreReal'] = filter_input(INPUT_POST, 'realNamem');
        $data['claveAcendepm'] = filter_input(INPUT_POST, 'keyAcendepm');
        $data['tipo'] = filter_input(INPUT_POST, 'typem');
        $data['llaveResponsable'] = filter_input(INPUT_POST, 'keyResponsabem');
        $data['observaciones'] = filter_input(INPUT_POST, 'obsm');
        
        
        if ($warehousesService->update($data)) {
            echo json_encode(array("state" => true, "message" => WAREHOUSES_UPDATE_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => WAREHOUSES_UPDATE_ERROR));
        }
        break;

    case "getById":

        $id = filter_input(INPUT_POST, 'id');

        $response = $warehousesService->getById($id);

        echo json_encode($response);

        break;

    default :
        break;
}    