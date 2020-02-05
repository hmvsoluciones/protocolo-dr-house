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

        $data['claveRubroCATS']= filter_input(INPUT_POST, 'claveRubro');
            $data['claveEntidadCATS']= filter_input(INPUT_POST, 'claveEntidad');
            $data['estatusRegistroCATS']= 1;
            $data['descripcionCATS']= filter_input(INPUT_POST, 'descripcion');
            $data['claveJustificadaCATS']= filter_input(INPUT_POST, 'claveJustificada');
            $data['clasificadorNumerico01CATS']= filter_input(INPUT_POST, 'clasificadorNumerico01');
            $data['clasificadorNumerico02CATS']= filter_input(INPUT_POST, 'clasificadorNumerico02');
            $data['clasificadorAlfanumerico01CATS']= filter_input(INPUT_POST, 'clasificadorAlfanumerico01');
            $data['clasificadorAlfanumerico02CATS']= filter_input(INPUT_POST, 'clasificadorAlfanumerico02');
            $data['observacionesCATS']= filter_input(INPUT_POST, 'observaciones');
            $data['IDUSERALTA']= $_SESSION['user']['IDUSER'];
            $data['fechaAltaCATS']= date('Y-m-d');
            

        if ($catalogService->add($data)) {
            echo json_encode(array("state" => true, "message" => CATALOG_ADD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => CATALOG_ADD_ERROR));
        }
        break;
    case "update":

            $data['claveRubro']= filter_input(INPUT_POST, 'claveRubrom');
            $data['claveEntidad']= filter_input(INPUT_POST, 'claveEntidadm');
            $data['estatusRegistro']= filter_input(INPUT_POST, 'estatusRegistrom');
            $data['descripcion']= filter_input(INPUT_POST, 'descripcionm');
            $data['claveJustificada']= filter_input(INPUT_POST, 'claveJustificadam');
            $data['clasificadorNumerico01']= filter_input(INPUT_POST, 'clasificadorNumerico01m');
            $data['clasificadorNumerico02']= filter_input(INPUT_POST, 'clasificadorNumerico02m');
            $data['clasificadorAlfanumerico01']= filter_input(INPUT_POST, 'clasificadorAlfanumerico01m');
            $data['clasificadorAlfanumerico02']= filter_input(INPUT_POST, 'clasificadorAlfanumerico02m');
            $data['observaciones']= filter_input(INPUT_POST, 'observacionesm');
            $data['IDUSERUPDATE']= $_SESSION['user']['IDUSER'];
            $data['fechaUpdate']= date('Y-m-d');
            $data['idCatalogo'] = filter_input(INPUT_POST, "idCatalogom");
            
            

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
        $rubro = filter_input(INPUT_POST, 'rubro');
        $response = $catalogService->getAllDataByRubro($rubro);
        echo json_encode($response);

        break;
    default :
        break;
}    