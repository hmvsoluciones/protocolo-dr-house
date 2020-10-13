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
// Google Auth
require_once '../../libraries/google-auth/gpClientConfig.php';

$op = filter_input(INPUT_GET, 'op');

$loginServie = new LoginServiceImpl();


switch ($op) {
    case "loginGL":
        if(isset($_GET['code'])){
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }
        
        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }
        
        if ($gClient->getAccessToken()) {
            //Get user profile data from google
            $gpUserProfile = $google_oauthV2->userinfo->get();
            
                       
            
            // $userData = $user->checkUser($gpUserData);
            
            //Storing user data into session
            
            $_SESSION['user']  = array(
                "IDUSER" => $gpUserProfile['id'],
                "NAME" => $gpUserProfile['name'],
                "LASTNAME" => '',
                "LASTNAME2" => '',
                "USER" => $gpUserProfile['email'],
                "MAIL" => $gpUserProfile['email'],
                "STATE" => 1

            );
            $language= filter_input(INPUT_POST, "language");
            $_SESSION['language']  = (!empty($language))?$language:'ES';

           
            //$_SESSION['roles']  = $loginServie->getRolesByIdUser($user['IDUSER']);
            var_dump($_SESSION);
            header("Location: ../../roles.php");
        } else {
            header("Location: ../../index.php");            
        }
    break;
    case "login":

        $loginRequest = new LoginRequest();
        $loginRequest->setUser(filter_input(INPUT_POST, "user"));
        $loginRequest->setPassword(filter_input(INPUT_POST, "password"));
        

        $user = $loginServie->login($loginRequest);

        

        if (isset($user)) {
            
            session_unset();

            $_SESSION['user']  = $user;
            
            $_SESSION['roles']  = $loginServie->getRolesByIdUser($user['IDUSER']);

            $language= filter_input(INPUT_POST, "language");
            
            $_SESSION['language']  = (!empty($language))?$language:'ES';

                        
            header("Location: ../../roles.php");
        } else {
            header("Location: ../../index.php");
        }
        break;

    default:
        return NULL;
        break;
}