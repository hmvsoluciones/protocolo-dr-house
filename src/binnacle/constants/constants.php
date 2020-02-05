<?php

if (!isset($_SESSION)) {
    session_start();
}

$language = (isset($_SESSION['language']))?$_SESSION['language']:""; 

switch ($language) {
    case "ES":
        //require_once 'ES.php';
       require_once __DIR__ . '../../../src/constants/ES.php';
        break;
    case "EN":
        
        require_once __DIR__ . '../../../src/constants/EN.php';
        break;

    default:
        require_once __DIR__ . '../../../src/constants/ES.php';
        break;
}
 