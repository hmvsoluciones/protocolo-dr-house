<?php

class WarehousesDaoImpl extends Connection implements WarehousesDao {

    private $util;
   

    function WarehousesDaoImpl() {
        $this->util = new UtilImpl();
       
    }

    public function getAllData() {

       $query = "SELECT ID, CLAVEALMACEN, NOMBREREAL, CLAVEACENDEP, TIPO, CLAVEPERSONALRESPONSABLE, OBSERVACIONES, CLAVEUSUARIOALTA, DATE_FORMAT(FECHAALTA, '%d-%m-%Y') as FECHAALTA, CLAVEUSUARIOCAMBIO, DATE_FORMAT(FECHACAMBIO, '%d-%m-%Y') as FECHACAMBIO FROM almacenes";
      
        $json = $this->getAll($query);

        return $json;
    }

    public function add($data) {


        $query = "INSERT INTO almacenes(CLAVEALMACEN, NOMBREREAL, CLAVEACENDEP, TIPO, CLAVEPERSONALRESPONSABLE, OBSERVACIONES, CLAVEUSUARIOALTA, FECHAALTA)"
                . " VALUES( '{$data['claveAlmacen']}', '{$data['nombreReal']}', '{$data['claveAcendep']}', '{$data['tipo']}', '{$data['claveResponsable']}', '{$data['observaciones']}', '{$_SESSION['user']['USER']}', curdate());";
             
        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {
        $query = "UPDATE almacenes SET CLAVEALMACEN = '{$data['claveAlmacen']}', NOMBREREAL = '{$data['nombreReal']}', CLAVEACENDEP = '{$data['claveAcendepm']}', TIPO = '{$data['tipo']}', CLAVEPERSONALRESPONSABLE = '{$data['llaveResponsable']}', OBSERVACIONES = '{$data['observaciones']}', CLAVEUSUARIOCAMBIO = '{$_SESSION['user']['USER']}', FECHACAMBIO = curdate() WHERE ID = {$data['id']};";
             
        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $query = "SELECT ID, CLAVEALMACEN, NOMBREREAL, CLAVEACENDEP, TIPO, CLAVEPERSONALRESPONSABLE, OBSERVACIONES, CLAVEUSUARIOALTA, DATE_FORMAT(FECHAALTA, '%d-%m-%Y') as FECHAALTA, CLAVEUSUARIOCAMBIO, DATE_FORMAT(FECHACAMBIO, '%d-%m-%Y') as FECHACAMBIO FROM almacenes WHERE ID = {$id}";
        
        return $this->getRow($query);
    }

}
