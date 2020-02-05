<?php

class GenericsServiceImpl implements GenericsService {

    private $genericsDao;
    private $binnacleDao;
    private $loginDao;

    public function __construct() {
        $this->genericsDao = new GenericsDaoImpl();
        $this->loginDao = new LoginDaoImpl();
        $this->binnacleDao = new BinnacleDaoImpl();
    }

    public function getAllData() {

        return $this->genericsDao->getAllData();
    }

    public function add($data) {

        return $this->genericsDao->add($data);
    }

    public function update($data) {

        try {
            
            $binnacleData['idReferencia'] = $data['id'];
            $binnacleData['claveTabla'] = 5;
            $binnacleData['dominioTabla'] = "TABLAS";
            $binnacleData['claveOperacion'] = 2;
            $binnacleData['dominioOperacion'] = "CRUD";
            
            $binnacleData['lastValue'] = json_encode($this->genericsDao->getById($data['id']));
            $binnacleData['idUser'] = $_SESSION['user']['IDUSER'];

            if ($this->binnacleDao->add($binnacleData) && $this->genericsDao->update($data)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getById($id) {
        return $this->genericsDao->getById($id);
    }

   
}
