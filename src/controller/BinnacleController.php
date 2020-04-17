<?php

session_start();

require_once '../model/LoginRequest.php';
require_once '../util/Util.php';
require_once '../util/impl/UtilImpl.php';

require_once '../connection/Connection.php';
require_once '../binnacle/service/BinnacleService.php';
require_once '../binnacle/service/BinnacleServiceImpl.php';
require_once '../binnacle/dao/BinnacleDao.php';
require_once '../binnacle/dao/BinnacleDaoImpl.php';


require_once __DIR__ . '../../../src/constants/constants.php';

$op = filter_input(INPUT_GET, 'op');

$binnacleService = new BinnacleServiceImpl();
$binnacleService = new binnacleServiceImpl();

switch ($op) {
    case "binnacleSearch":

        $params['binnacleDate'] = filter_input(INPUT_POST, 'binnacleDate');
        $params['catalogTable'] = filter_input(INPUT_POST, 'catalogTable');
        $params['catalogOperations'] = filter_input(INPUT_POST, 'catalogOperations');        
        $params['user'] = filter_input(INPUT_POST, 'user');

        $response = $binnacleService->binnacleSearch($params);

        echo json_encode($response);
        break;
    case "getBinnacleTableHeader":
            echo json_encode(BINNACLE_TABLE_HEADER);
            break;    
    default :
        break;
}    