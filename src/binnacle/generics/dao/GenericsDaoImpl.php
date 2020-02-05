<?php

class GenericsDaoImpl extends Connection implements GenericsDao {

    private $util;

    function GenericsDaoImpl() {
        $this->util = new UtilImpl();
    }

    public function getAllData() {

        $query = "SELECT ID, CLAVEGERICO, NOMBRE, NOMBRECORTO, CLAVERUBROTIPO, CLAVETIPO,INTERCAMBIABLE, CLAVEUSUARIOALTA, FECHAALTA, DATE_FORMAT(FECHAALTA,'%d-%m-%Y') AS FECHAALTA, CLAVEUSUARIOCAMBIO, DATE_FORMAT(FECHACAMBIO,'%d-%m-%Y') AS FECHACAMBIO FROM genericos";

        $json = $this->getAll($query);

        return $json;
    }

    public function add($data) {

        $query = "INSERT INTO genericos(CLAVEGERICO, NOMBRE, NOMBRECORTO, CLAVERUBROTIPO, CLAVETIPO, INTERCAMBIABLE, CLAVEUSUARIOALTA, FECHAALTA) "
                . " VALUES('{$data['genericKey']}', '{$data['genericName']}', '{$data['genericShortName']}', '{$data['genericTypeRubro']}', '{$data['genericTypeClave']}', '{$data['genericChange']}', '{$_SESSION['user']['USER']}', curdate());";
             
        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {

        $query = "UPDATE genericos SET CLAVEGERICO = '{$data['genericKey']}', NOMBRE = '{$data['genericName']}', NOMBRECORTO = '{$data['genericShortName']}', CLAVERUBROTIPO = '{$data['genericTypeRubro']}', CLAVETIPO = '{$data['genericTypeClave']}', INTERCAMBIABLE = '{$data['genericChange']}', CLAVEUSUARIOCAMBIO = '{$_SESSION['user']['USER']}',  FECHACAMBIO = curdate() WHERE ID = {$data['id']}";
        
        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $query = "SELECT ID, CLAVEGERICO, NOMBRE, NOMBRECORTO, CLAVERUBROTIPO, CLAVETIPO,INTERCAMBIABLE, CLAVEUSUARIOALTA, FECHAALTA, DATE_FORMAT(FECHAALTA,'%d-%m-%Y') AS FECHAALTA, CLAVEUSUARIOCAMBIO, DATE_FORMAT(FECHACAMBIO,'%d-%m-%Y') AS FECHACAMBIO FROM genericos WHERE ID = {$id}";

        return $this->getRow($query);
    }
    
}
