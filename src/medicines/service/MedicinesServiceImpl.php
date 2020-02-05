<?php

class MedicinesServiceImpl implements MedicinesService {

    private $medicinesDao;
    private $binnacleDao;

    public function __construct() {
        $this->medicinesDao = new MedicinesDaoImpl();
        $this->binnacleDao = new BinnacleDaoImpl();
    }

    public function getAllData() {

        return $this->medicinesDao->getAllData();
    }

    public function add($data) {        

        return $this->medicinesDao->add($data);
    }

    public function update($data) {

        try {                       

            $binnacleData['idReferencia'] = $data['id'];
            $binnacleData['claveTabla'] = 4;
            $binnacleData['dominioTabla'] = "TABLAS";
            $binnacleData['claveOperacion'] = 2;
            $binnacleData['dominioOperacion'] = "CRUD";
            
            $binnacleData['lastValue'] = json_encode($this->medicinesDao->getById($data['id']));
            $binnacleData['idUser'] = $_SESSION['user']['IDUSER'];

            if ($this->binnacleDao->add($binnacleData) && $this->medicinesDao->update($data)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getById($id) {
        return $this->medicinesDao->getById($id);
    }

   
}
