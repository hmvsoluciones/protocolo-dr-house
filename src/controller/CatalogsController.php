<?php

session_start();

require_once '../model/LoginRequest.php';
require_once '../util/Util.php';
require_once '../util/impl/UtilImpl.php';

require_once '../connection/Connection.php';
require_once '../catalogs/dao/CatalogDao.php';
require_once '../catalogs/dao/CatalogDaoImpl.php';
require_once '../catalogs/service/CatalogService.php';
require_once '../catalogs/service/CatalogServiceImpl.php';
require_once '../binnacle/dao/BinnacleDao.php';
require_once '../binnacle/dao/BinnacleDaoImpl.php';


require_once __DIR__ . '../../../src/constants/constants.php';

$op = filter_input(INPUT_GET, 'op');

$catalogService = new CatalogServiceImpl();

switch ($op) {
    case "getAllTableHeader":
        echo json_encode(CATALOG_TABLE_HEADER);
        break;
    case "getAll":

        $response = $catalogService->getAllData();
        echo json_encode($response);

        break;   
    case "add":
        $data['catalogDomain']= filter_input(INPUT_POST, 'catalogDomain');
        $data['catalogKey']= filter_input(INPUT_POST, 'catalogKey');
        $data['catalogDescription']= filter_input(INPUT_POST, 'catalogDescription');
        $data['catalogState']= filter_input(INPUT_POST, 'catalogState');;
        $data['catalogValueEs']= filter_input(INPUT_POST, 'catalogValueEs');
        $data['catalogValueEn']= filter_input(INPUT_POST, 'catalogValueEn');
        $data['catalogOrder']= filter_input(INPUT_POST, 'catalogOrder');
        $data['IDUSERALTA']= $_SESSION['user']['IDUSER'];
        $data['fechaAlta']= date('Y-m-d');
            

        if ($catalogService->add($data)) {
            echo json_encode(array("state" => true, "message" => CATALOG_ADD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => CATALOG_ADD_ERROR));
        }
        break;
    case "update":            
            $data['idCatalogm'] = filter_input(INPUT_POST, "idCatalogm");
            $data['catalogDomainm']= filter_input(INPUT_POST, 'catalogDomainm');
            $data['catalogKeym']= filter_input(INPUT_POST, 'catalogKeym');
            $data['catalogValueEsm']= filter_input(INPUT_POST, 'catalogValueEsm');
            $data['catalogValueEnm']= filter_input(INPUT_POST, 'catalogValueEnm');
            $data['catalogOrderm']= filter_input(INPUT_POST, 'catalogOrderm');
            $data['catalogDescriptionm']= filter_input(INPUT_POST, 'catalogDescriptionm');          
            $data['catalogStatem']= filter_input(INPUT_POST, 'catalogStatem');          
            $data['IDUSERUPDATE']= $_SESSION['user']['IDUSER'];
            
            $data['currentDate']= date('Y-m-d');
                        
        if ($catalogService->update($data)) {
            echo json_encode(array("state" => true, "message" => CATALOG_UPDATE_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => CATALOG_UPDATE_ERROR));
        }
        break;
    case "getById":

        $id = filter_input(INPUT_POST, 'id');

        $response = $catalogService->getById($id);

        echo json_encode($response);

        break;
     case "getByCvesRubros":

        $rubros = filter_input(INPUT_POST, 'rubros');

        $response = $catalogService->getByCvesRubros($rubros);

        echo json_encode($response);

        break;
        case "getCatalogNames":
        
        $response = $catalogService->getCatalogNames();

        echo json_encode($response);

        break;
        case "getAllCatalogData":
        $domain = filter_input(INPUT_POST, 'domain');
        $response = $catalogService->getAllDataByDomain($domain);
        echo json_encode($response);

        break;
    default :
        break;
}    