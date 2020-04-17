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
    
    public function binnacleSearch($data){
        $where = "";
 
        if(!empty($data['binnacleDate'])){
            $where .= " AND   b.OPERATIONDATE =  STR_TO_DATE('{$data['binnacleDate']}', '%d-%c-%Y')";
        }
        if(!empty($data['catalogTable'])){
            $catTable = explode("-", $data['catalogTable']);
            $where .=" AND TABLECATALOGKEY = {$catTable[1]} AND TABLEDOMAIN='{$catTable[2]}'";
        }
        if(!empty($data['catalogOperations'])){            
            $catalogOperations = explode("-", $data['catalogOperations']);
            $where.= " AND OPERATIONCATALOGKEY = {$catalogOperations[1]} AND OPERATIONDOMAIN='{$catalogOperations[2]}' ";
        }
        if(!empty($data['user'])){
            $where.= " AND b.IDUSER = {$data['user']}";
        }

        $query = "SELECT b.IDBINNACLE, b.REFERENCEID, ct.VALUEEN OPERATIONTABLE, cop.VALUEEN OPERATION, b.OPERATIONDATE, b.OPERATIONTIME, b.LASTVALUE, b.IDUSER, u.NAME, u.LASTNAME, u.LASTNAME2 FROM binnacle b  "
            ." INNER JOIN catalogs ct ON ct.DOMAIN LIKE b.TABLEDOMAIN AND ct.CATALOGKEY = b.TABLECATALOGKEY "
            ." INNER JOIN catalogs cop ON cop.DOMAIN LIKE b.OPERATIONDOMAIN AND cop.CATALOGKEY = b.OPERATIONCATALOGKEY "
            ." INNER JOIN admuser u ON u.IDUSER = b.IDUSER "
            ." WHERE 1=1 {$where}";  

        return $this->getAll($query); 
    }

}
