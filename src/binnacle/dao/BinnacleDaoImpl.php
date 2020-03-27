<?php

class BinnacleDaoImpl extends Connection implements BinnacleDao {

    private $util;

    function BinnacleDaoImpl() {
        $this->util = new UtilImpl();
    }

    

    public function add($data) {
               
        $query = "INSERT INTO binnacle(REFERENCEID, TABLECATALOGKEY, TABLEDOMAIN, OPERATIONCATALOGKEY, OPERATIONDOMAIN, OPERATIONDATE, OPERATIONTIME, LASTVALUE, IDUSER)VALUES ({$data['referenceId']}, {$data['tableCatalogKey']}, '{$data['tableDomain']}', {$data['operationCatalogKey']}, '{$data['operationDomain']}',  curdate(),  curtime(), '{$data['lastValue']}',  {$data['idUser']});";      

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }       

}
