<?php

class BinnacleDaoImpl extends Connection implements BinnacleDao {

    private $util;

    function BinnacleDaoImpl() {
        $this->util = new UtilImpl();
    }

    

    public function add($data) {
               
       $query = "INSERT INTO bitacora(IDREFERENCIA, CLAVETABLA, DOMINIOTABLA, CLAVEOPERACION, DOMINIOOPERACION, FECHA, HORA, LASTVALUE, IDUSER) VALUES ({$data['idReferencia']}, {$data['claveTabla']}, '{$data['dominioTabla']}', {$data['claveOperacion']}, '{$data['dominioOperacion']}',  curdate(),  curtime(), '{$data['lastValue']}',  {$data['idUser']});";
       

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }       

}
