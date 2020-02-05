<?php

session_start();

require_once '../model/LoginRequest.php';
require_once '../util/Util.php';
require_once '../util/impl/UtilImpl.php';
require_once '../connection/Connection.php';
require_once '../login/service/LoginService.php';
require_once '../login/service/LoginServiceImpl.php';
require_once '../medicines/dao/MedicinesDao.php';
require_once '../medicines/dao/MedicinesDaoImpl.php';
require_once '../medicines/service/MedicinesService.php';
require_once '../medicines/service/MedicinesServiceImpl.php';
require_once '../binnacle/dao/BinnacleDao.php';
require_once '../binnacle/dao/BinnacleDaoImpl.php';


require_once __DIR__ . '../../../src/constants/constants.php';

$op = filter_input(INPUT_GET, 'op');

$medicinesService = new MedicinesServiceImpl();



switch ($op) {
    case "getTableHeader":
        echo json_encode(MEDICINES_TABLE_HEADER);
        break;
    case "getAllData":

        $response = $medicinesService->getAllData();

        echo json_encode($response);

        break;
    case "add":

        $clasificacion = explode("-", filter_input(INPUT_POST, 'medicinesClasification'));
        $data['medicinesClasificationRubro'] = $clasificacion[0];
        $data['medicinesClasification'] = $clasificacion[1];

        $areaTerapeutica = explode("-", filter_input(INPUT_POST, 'medicinesTherapeuticArea'));
        $data['medicinesTherapeuticAreaRubro'] = $areaTerapeutica[0];
        $data['medicinesTherapeuticArea'] = $areaTerapeutica[1];

        $familia = explode("-", filter_input(INPUT_POST, 'medicinesFamily'));
        $data['medicinesFamilyRubro'] = $familia[0];
        $data['medicinesFamily'] = $familia[1];

        $presentacion = explode("-", filter_input(INPUT_POST, 'medicinesPresentation'));
        $data['medicinesPresentationRubro'] = $presentacion[0];
        $data['medicinesPresentation'] = $presentacion[1];

        $proveedor = explode("-", filter_input(INPUT_POST, 'medicinesProvider'));
        $data['medicinesProviderRubro'] = $proveedor[0];
        $data['medicinesProvider'] = $proveedor[1];

        $unidadMedida = explode("-", filter_input(INPUT_POST, 'medicinesUnitOfMeasurement'));
        $data['medicinesUnitOfMeasurementRubro'] = $unidadMedida[0];
        $data['medicinesUnitOfMeasurement'] = $unidadMedida[1];


        $data['medicineKey'] = filter_input(INPUT_POST, 'medicineKey');
        $data['medicinesDescription'] = filter_input(INPUT_POST, 'medicinesDescription');
        $data['medicinesComercialDescription'] = filter_input(INPUT_POST, 'medicinesComercialDescription');
        $data['medicinesHealtSectorKey'] = filter_input(INPUT_POST, 'medicinesHealtSectorKey');
        $data['medicinesBarcodeKey'] = filter_input(INPUT_POST, 'medicinesBarcodeKey');
        $data['medicinesGenericKey'] = filter_input(INPUT_POST, 'medicinesGenericKey');
        $data['medicinesCost'] = filter_input(INPUT_POST, 'medicinesCost');
        $data['medicinesVolume'] = filter_input(INPUT_POST, 'medicinesVolume');
        $data['medicinesWeight'] = filter_input(INPUT_POST, 'medicinesWeight');
        $data['medicinesOsmolarity'] = filter_input(INPUT_POST, 'medicinesOsmolarity');
        $data['medicinesDensity'] = filter_input(INPUT_POST, 'medicinesDensity');
        $data['medicinesCalories'] = filter_input(INPUT_POST, 'medicinesCalories');
        $data['medicinesConcentration'] = filter_input(INPUT_POST, 'medicinesConcentration');
        $data['medicinesMaximumDoseKilogram'] = filter_input(INPUT_POST, 'medicinesMaximumDoseKilogram');
        $data['medicinesMaximumDoseMeter2'] = filter_input(INPUT_POST, 'medicinesMaximumDoseMeter2');
        $data['medicinesValencia'] = filter_input(INPUT_POST, 'medicinesValencia');
        $data['medicinesConfigurator'] = filter_input(INPUT_POST, 'medicinesConfigurator');
        $data['medicinesShowOnco'] = filter_input(INPUT_POST, 'medicinesShowOnco');
        $data['medicinesShowNpt'] = filter_input(INPUT_POST, 'medicinesShowNpt');
        $data['medicinesShowAnti'] = filter_input(INPUT_POST, 'medicinesShowAnti');

        if ($medicinesService->add($data)) {
            echo json_encode(array("state" => true, "message" => MEDICINES_ADD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => MEDICINES_ADD_ERROR));
        }
        break;
    case "update":

        $data['id'] = filter_input(INPUT_POST, 'idm');
        
        $clasificacion = explode("-", filter_input(INPUT_POST, 'medicinesClasificationm'));
        $data['medicinesClasificationRubro'] = $clasificacion[0];
        $data['medicinesClasification'] = $clasificacion[1];

        $areaTerapeutica = explode("-", filter_input(INPUT_POST, 'medicinesTherapeuticAream'));
        $data['medicinesTherapeuticAreaRubro'] = $areaTerapeutica[0];
        $data['medicinesTherapeuticArea'] = $areaTerapeutica[1];

        $familia = explode("-", filter_input(INPUT_POST, 'medicinesFamilym'));
        $data['medicinesFamilyRubro'] = $familia[0];
        $data['medicinesFamily'] = $familia[1];

        $presentacion = explode("-", filter_input(INPUT_POST, 'medicinesPresentationm'));
        $data['medicinesPresentationRubro'] = $presentacion[0];
        $data['medicinesPresentation'] = $presentacion[1];

        $proveedor = explode("-", filter_input(INPUT_POST, 'medicinesProviderm'));
        $data['medicinesProviderRubro'] = $proveedor[0];
        $data['medicinesProvider'] = $proveedor[1];

        $unidadMedida = explode("-", filter_input(INPUT_POST, 'medicinesUnitOfMeasurementm'));
        $data['medicinesUnitOfMeasurementRubro'] = $unidadMedida[0];
        $data['medicinesUnitOfMeasurement'] = $unidadMedida[1];


        $data['medicineKey'] = filter_input(INPUT_POST, 'medicineKeym');
        $data['medicinesDescription'] = filter_input(INPUT_POST, 'medicinesDescriptionm');
        $data['medicinesComercialDescription'] = filter_input(INPUT_POST, 'medicinesComercialDescriptionm');
        $data['medicinesHealtSectorKey'] = filter_input(INPUT_POST, 'medicinesHealtSectorKeym');
        $data['medicinesBarcodeKey'] = filter_input(INPUT_POST, 'medicinesBarcodeKeym');
        $data['medicinesGenericKey'] = filter_input(INPUT_POST, 'medicinesGenericKeym');
        $data['medicinesCost'] = filter_input(INPUT_POST, 'medicinesCostm');
        $data['medicinesVolume'] = filter_input(INPUT_POST, 'medicinesVolumem');
        $data['medicinesWeight'] = filter_input(INPUT_POST, 'medicinesWeightm');
        $data['medicinesOsmolarity'] = filter_input(INPUT_POST, 'medicinesOsmolaritym');
        $data['medicinesDensity'] = filter_input(INPUT_POST, 'medicinesDensitym');
        $data['medicinesCalories'] = filter_input(INPUT_POST, 'medicinesCaloriesm');
        $data['medicinesConcentration'] = filter_input(INPUT_POST, 'medicinesConcentrationm');
        $data['medicinesMaximumDoseKilogram'] = filter_input(INPUT_POST, 'medicinesMaximumDoseKilogramm');
        $data['medicinesMaximumDoseMeter2'] = filter_input(INPUT_POST, 'medicinesMaximumDoseMeter2m');
        $data['medicinesValencia'] = filter_input(INPUT_POST, 'medicinesValenciam');
        $data['medicinesConfigurator'] = filter_input(INPUT_POST, 'medicinesConfiguratorm');
        $data['medicinesShowOnco'] = filter_input(INPUT_POST, 'medicinesShowOncom');
        $data['medicinesShowNpt'] = filter_input(INPUT_POST, 'medicinesShowNptm');
        $data['medicinesShowAnti'] = filter_input(INPUT_POST, 'medicinesShowAntim');
        $data['state'] = filter_input(INPUT_POST, 'statem');
        

        if ($medicinesService->update($data)) {
        echo json_encode(array("state" => true, "message" => MEDICINES_UPDATE_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => MEDICINES_UPDATE_ERROR));
        }
        break;

    case "getById":

        $id = filter_input(INPUT_POST, 'id');

        $response = $medicinesService->getById($id);

        echo json_encode($response);

        break;
    default :
        break;
}    