<?php

session_start();

require_once '../model/LoginRequest.php';
require_once '../util/Util.php';
require_once '../util/impl/UtilImpl.php';

require_once '../connection/Connection.php';
require_once '../login/dao/LoginDao.php';
require_once '../login/dao/LoginDaoImpl.php';
require_once '../users/dao/UserDao.php';
require_once '../users/dao/UserDaoImpl.php';
require_once '../users/service/UserService.php';
require_once '../users/service/UserServiceImpl.php';
require_once '../login/service/LoginService.php';
require_once '../login/service/LoginServiceImpl.php';
require_once '../binnacle/dao/BinnacleDao.php';
require_once '../binnacle/dao/BinnacleDaoImpl.php';


require_once __DIR__ . '../../../src/constants/constants.php';

$op = filter_input(INPUT_GET, 'op');

$userService = new UserServiceImpl();
$loginService = new LoginServiceImpl();

switch ($op) {
    case "getAllUsersTableHeader":
        echo json_encode(USER_TABLE_HEADER);
        break;
    case "getAllUsers":

        $response = $userService->getUsers();
        echo json_encode($response);

        break;
    case "addUser":

        $user['name'] = filter_input(INPUT_POST, 'name');
        $user['lastName'] = filter_input(INPUT_POST, 'lastName');
        $user['lastName2'] = filter_input(INPUT_POST, 'lastName2');
        $user['mail'] = filter_input(INPUT_POST, 'mail');
        $user['user'] = filter_input(INPUT_POST, 'user');

        if ($userService->add($user)) {
            echo json_encode(array("state" => true, "message" => USER_ADD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => USER_ADD_ERROR));
        }
        break;
    case "updateUser":

        $user['idUser'] = filter_input(INPUT_POST, 'idUserm');
        $user['name'] = filter_input(INPUT_POST, 'namem');
        $user['lastName'] = filter_input(INPUT_POST, 'lastNamem');
        $user['lastName2'] = filter_input(INPUT_POST, 'lastName2m');
        $user['mail'] = filter_input(INPUT_POST, 'mailm');
        $user['user'] = filter_input(INPUT_POST, 'userm');
        $user['state'] = filter_input(INPUT_POST, 'statem');

        if ($userService->update($user)) {
            echo json_encode(array("state" => true, "message" => USER_UPDATE_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => USER_UPDATE_ERROR));
        }
        break;
    case "getUserById":

        $idUser = filter_input(INPUT_POST, 'user');

        $response = $userService->getUserById($idUser);

        echo json_encode($response);

        break;
    case "resetPassword":

        $idUser = filter_input(INPUT_POST, 'idUserr');
        $password = filter_input(INPUT_POST, 'password');

        if ($userService->resetPassword($idUser, $password)) {
            echo json_encode(array("state" => true, "message" => USER_RESET_PASSWORD_SUCCESS));
        } else {
            echo json_encode(array("state" => false, "message" => USER_RESET_PASSWORD_ERROR));
        }

        break;
    case "getAllRoles":
        echo json_encode($loginService->getAllRoles($_SESSION['language']));
        break;
    case "getRolesByUser":

        echo json_encode($loginService->getRolesByIdUser(filter_input(INPUT_POST, 'idUser')));
        break;
    case "setRole":
        $idRole = filter_input(INPUT_POST, 'role');
        $setRole = $loginService->setRole($idRole, filter_input(INPUT_POST, 'idUser'));

        if ($setRole == 1) {
            echo json_encode(array("state" => true, "message" => USER_SET_ROLE_SUCCESS, "op" => "success"));
        } else if ($setRole == 2) {
            echo json_encode(array("state" => true, "message" => USER_UNSET_ROLE_SUCCESS, "op" => "warning"));
        } else {
            echo json_encode(array("state" => false, "message" => USER_SET_ROLE_ERROR));
        }
        break;
    case "validUser":
        $user = filter_input(INPUT_POST, 'user');


        $response = $userService->getUserByUser($user);

        $valid = TRUE;
        $message = "";

        if ($response) {
            $valid = FALSE;
            $message = USER_NOT_VALID;
        }

        echo json_encode(array("response" => $valid, "message" => $message));

        break;
    case "updatePassword":
        $current = filter_input(INPUT_POST, 'current');
        $new = filter_input(INPUT_POST, 'new');
        $confirm = filter_input(INPUT_POST, 'confirm');

        $response = $userService->updatePassword($current, $new, $confirm);
               
        if ($response == 1) {
            echo json_encode(array("state" => true, "message" => USER_UPDATE_PASSWORD_SUCCESS));
        } else if ($response == 2) {
            echo json_encode(array("state" => false, "message" => USER_UPDATE_PASSWORD_NOT_VALID_CONFIRM));
        } else if ($response == 3) {
            echo json_encode(array("state" => false, "message" => USER_UPDATE_PASSWORD_NOT_VALID_USER));
        } else if ($response == 4) {
            echo json_encode(array("state" => false, "message" => USER_UPDATE_PASSWORD_ERROR));
        } else {
            echo json_encode(array("state" => false, "message" => USER_UPDATE_PASSWORD_ERROR));
        }
        break;
    default :
        break;
}    