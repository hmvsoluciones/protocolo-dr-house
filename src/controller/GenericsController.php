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
require_once '../generics/dao/GenericsDao.php';
require_once '../generics/dao/GenericsDaoImpl.php';
require_once '../generics/service/GenericsService.php';
require_once '../generics/service/GenericsServiceImpl.php';
require_once '../binnacle/dao/BinnacleDao.php';
require_once '../binnacle/dao/BinnacleDaoImpl.php';


require_once __DIR__ . '../../../src/constants/constants.php';

$op = filter_input(INPUT_GET, 'op');

$genericsService = new GenericsServiceImpl();
$loginService = new LoginServiceImpl();



switch ($op) {
    case "getTableHeader":
        echo json_encode(GENERIC_TABLE_HEADER);
        break;
    case "getAllData":

        $response = $genericsService->getAllData();
        
        echo json_encode($response);

        break;
    case "add":

        $tipo = explode("-", filter_input(INPUT_POST, 'genericType'));
        $data['genericTypeRubro'] = $tipo[0];
        $data['genericTypeClave'] = $tipo[1];
        
        $data['genericKey'] = filter_input(INPUT_POST, 'genericKey');        
        $data['genericName'] = filter_input(INPUT_POST, 'genericName');
        $data['genericShortName'] = filter_input(INPUT_POST, 'genericShortName');
        $data['genericType'] = filter_input(INPUT_POST, 'genericType');
        $data['genericChange'] = filter_input(INPUT_POST, 'genericChange');   

        if ($genericsService->add($data)) {
            echo json_encode(array("state" => true, "message" => GENERIC_ADD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => GENERIC_ADD_ERROR));
        }
        break;
    case "update":       

        $tipo = explode("-", filter_input(INPUT_POST, 'genericTypem'));
        $data['genericTypeRubro'] = $tipo[0];
        $data['genericTypeClave'] = $tipo[1];
        
        $data['id'] = filter_input(INPUT_POST, 'idm');
        $data['genericKey'] = filter_input(INPUT_POST, 'genericKeym');        
        $data['genericName'] = filter_input(INPUT_POST, 'genericNamem');
        $data['genericShortName'] = filter_input(INPUT_POST, 'genericShortNamem');        
        $data['genericType'] = filter_input(INPUT_POST, 'genericTypem');
        $data['genericChange'] = filter_input(INPUT_POST, 'genericChangem');                       
        
        if ($genericsService->update($data)) {
            echo json_encode(array("state" => true, "message" => GENERIC_UPDATE_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => GENERIC_UPDATE_ERROR));
        }
        break;

    case "getById":

        $id = filter_input(INPUT_POST, 'id');

        $response = $genericsService->getById($id);

        echo json_encode($response);

        break;

    default :
        break;
}    