<?php

class WarehousesServiceImpl implements WarehousesService {

    private $warehousesDao;
    private $binnacleDao;
    private $loginDao;

    public function __construct() {
        $this->warehousesDao = new WarehousesDaoImpl();
        $this->loginDao = new LoginDaoImpl();
        $this->binnacleDao = new BinnacleDaoImpl();
    }

    public function getAllData() {

        return $this->warehousesDao->getAllData();
    }

    public function add($data) {

       // $data['fechaIngreso'] = date("Y-m-d", strtotime($data['fechaIngreso']));

        return $this->warehousesDao->add($data);
    }

    public function update($data) {

        try {
           
            $binnacleData['idReferencia'] = $data['id'];
            $binnacleData['claveTabla'] = 3;
            $binnacleData['dominioTabla'] = "TABLAS";
            $binnacleData['claveOperacion'] = 2;
            $binnacleData['dominioOperacion'] = "CRUD";
            
            $binnacleData['lastValue'] = json_encode($this->warehousesDao->getById($data['id']));
            $binnacleData['idUser'] = $_SESSION['user']['IDUSER'];

            if ($this->binnacleDao->add($binnacleData) && $this->warehousesDao->update($data)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getById($id) {
        return $this->warehousesDao->getById($id);
    }

   
}
