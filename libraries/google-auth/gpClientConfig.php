<?php

//Include Google client library 
include_once 'Google_Client.php';
include_once 'contrib/Google_Oauth2Service.php';

/*
 * Configurar en Google IDs de cliente de OAuth 2.0
 * Configuration and setup Google API
 */
$clientId = '280708252248-33j02gdln07rr41as7suoqdrbu6g3334.apps.googleusercontent.com'; 
$clientSecret = 'wnTDyADdypB8WN6H2NDPAqA8';
$redirectURL = 'http://localhost/php_workspace/protocolo-dr-house/src/controller/SessionController.php?op=loginGL'; 


//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login protocolo_dr_house');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>