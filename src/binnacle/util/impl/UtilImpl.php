<?php

class UtilImpl implements Util {

    public function decrypt($textToDecrypt) {

        $config_sec = parse_ini_file(__DIR__ . '../../../config/config_security.ini');

        $password = $config_sec['encrypKey'];

        $textToDecrypt = base64_decode($textToDecrypt);
        $method = "AES-256-CBC";
        $iv = substr($textToDecrypt, 0, 16);
        $hash = substr($textToDecrypt, 16, 32);
        $ciphertext = substr($textToDecrypt, 48);
        $key = hash('sha256', $password, true);

        if (hash_hmac('sha256', $ciphertext, $key, true) !== $hash)
            return null;

        return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    }

    public function encrypt($textToEncrypt) {

        $config_sec = parse_ini_file(__DIR__ . '../../../config/config_security.ini');

        $password = $config_sec['encrypKey'];

        $method = "AES-256-CBC";
        $key = hash('sha256', $password, true);
        //$iv = openssl_random_pseudo_bytes(16);
        $iv = $config_sec['encrypIV'];
        
        $ciphertext = openssl_encrypt($textToEncrypt, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext, $key, true);

        return base64_encode($iv . $hash . $ciphertext);
    }

}
