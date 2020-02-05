<?php

$conection = mysqli_connect('a2plcpnl0251.prod.iad2.secureserver.net', 'usr_issemym2', '123456789', 'cm_issemym');


mysqli_set_charset($conection, "utf8");

if (mysqli_connect_errno()) {
    echo 'could not connect database'. mysqli_connect_errno();
} else {
    echo "CONECTADO";
}
        
        
        