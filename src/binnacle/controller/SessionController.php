<?php

session_start();


require_once '../util/Util.php';
require_once '../util/impl/UtilImpl.php';
require_once '../model/LoginRequest.php';

require_once '../connection/Connection.php';
require_once '../login/dao/LoginDao.php';
require_once '../login/dao/LoginDaoImpl.php';
require_once '../login/service/LoginService.php';
require_once '../login/service/LoginServiceImpl.php';


$op = filter_input(INPUT_GET, 'op');

$loginServie = new LoginServiceImpl();

switch ($op) {
    case "login":

        $loginRequest = new LoginRequest();
        $loginRequest->setUser(filter_input(INPUT_POST, "user"));
        $loginRequest->setPassword(filter_input(INPUT_POST, "password"));
        $language= filter_input(INPUT_POST, "language");

        $user = $loginServie->login($loginRequest);

        if (isset($user)) {
            
            session_unset();

            $_SESSION['user']  = $user;
           
            $_SESSION['roles']  = $loginServie->getRolesByIdUser($user['IDUSER']);
            $_SESSION['language']  = $language;
                        
            header("Location: ../../roles.php");
        } else {
            header("Location: ../../index.php");
        }
        break;

    default:
        return NULL;
        break;
}