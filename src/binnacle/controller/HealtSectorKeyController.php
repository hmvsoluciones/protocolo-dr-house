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
require_once '../doctors/dao/DoctorsDao.php';
require_once '../doctors/dao/DoctorsDaoImpl.php';
require_once '../doctors/service/DoctorsService.php';
require_once '../doctors/service/DoctorsServiceImpl.php';
require_once '../binnacle/dao/BinnacleDao.php';
require_once '../binnacle/dao/BinnacleDaoImpl.php';


require_once __DIR__ . '../../../src/constants/constants.php';

$op = filter_input(INPUT_GET, 'op');

$doctorsService = new DoctorsServiceImpl();
$loginService = new LoginServiceImpl();



switch ($op) {
    case "getTableHeader":
        echo json_encode(DOCTOR_TABLE_HEADER);
        break;
    case "getAllData":

        $response = $doctorsService->getAllData();
        
        echo json_encode($response);

        break;
    case "add":

        $especialidad = explode("-", filter_input(INPUT_POST, 'specialityKey'));

        $data['id'] = filter_input(INPUT_POST, 'id');
        $data['matriculaMedico'] = filter_input(INPUT_POST, 'doctorRegistration');
        $data['estatusRegistro'] = 1;
        $data['rfc'] = filter_input(INPUT_POST, 'rfc');
        $data['curp'] = filter_input(INPUT_POST, 'curp');
        $data['cedulaProfesional'] = filter_input(INPUT_POST, 'profesionalLicense');
        $data['nombre'] = filter_input(INPUT_POST, 'name');
        $data['apellidoPaterno'] = filter_input(INPUT_POST, 'lastName');
        $data['apellidoMaterno'] = filter_input(INPUT_POST, 'lastName2');

        $data['claveRubroEspecialidad'] = $especialidad[0];
        $data['claveEspecialidad'] = $especialidad[1];

        $data['telefonos'] = filter_input(INPUT_POST, 'phone');
        $data['fechaIngreso'] = filter_input(INPUT_POST, 'admisionDate');
        $data['observaciones'] = filter_input(INPUT_POST, 'observations');

        if ($doctorsService->add($data)) {
            echo json_encode(array("state" => true, "message" => DOCTOR_ADD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => DOCTOR_ADD_ERROR));
        }
        break;
    case "update":

        $especialidad = explode("-", filter_input(INPUT_POST, 'specialityKeym'));

        $data['id'] = filter_input(INPUT_POST, 'idm');
        $data['matriculaMedico'] = filter_input(INPUT_POST, 'doctorRegistrationm');
        $data['estatusRegistro'] = filter_input(INPUT_POST, 'statem');
        $data['rfc'] = filter_input(INPUT_POST, 'rfcm');
        $data['curp'] = filter_input(INPUT_POST, 'curpm');
        $data['cedulaProfesional'] = filter_input(INPUT_POST, 'profesionalLicensem');
        $data['nombre'] = filter_input(INPUT_POST, 'namem');
        $data['apellidoPaterno'] = filter_input(INPUT_POST, 'lastNamem');
        $data['apellidoMaterno'] = filter_input(INPUT_POST, 'lastName2m');

        $data['claveRubroEspecialidad'] = $especialidad[0];
        $data['claveEspecialidad'] = $especialidad[1];

        $data['telefonos'] = filter_input(INPUT_POST, 'phonem');
        $data['fechaIngreso'] = filter_input(INPUT_POST, 'admisionDatem');
        $data['observaciones'] = filter_input(INPUT_POST, 'observationsm');

        if ($doctorsService->update($data)) {
            echo json_encode(array("state" => true, "message" => DOCTOR_UPDATE_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => DOCTOR_UPDATE_ERROR));
        }
        break;

    case "getById":

        $id = filter_input(INPUT_POST, 'id');

        $response = $doctorsService->getById($id);

        echo json_encode($response);

        break;

    default :
        break;
}    