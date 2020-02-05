<?php

class DoctorsServiceImpl implements DoctorsService {

    private $doctorsDao;
    private $binnacleDao;
    private $loginDao;

    public function __construct() {
        $this->doctorsDao = new DoctorsDaoImpl();
        $this->loginDao = new LoginDaoImpl();
        $this->binnacleDao = new BinnacleDaoImpl();
    }

    public function getAllData() {

        return $this->doctorsDao->getAllData();
    }

    public function add($data) {

        $data['fechaIngreso'] = date("Y-m-d", strtotime($data['fechaIngreso']));

        return $this->doctorsDao->add($data);
    }

    public function update($data) {

        try {
            
            $data["fechaIngreso"] =  date('Y-m-d', strtotime($data["fechaIngreso"]));

            $binnacleData['idReferencia'] = $data['id'];
            $binnacleData['claveTabla'] = 3;
            $binnacleData['dominioTabla'] = "TABLAS";
            $binnacleData['claveOperacion'] = 2;
            $binnacleData['dominioOperacion'] = "CRUD";
            
            $binnacleData['lastValue'] = json_encode($this->doctorsDao->getById($data['id']));
            $binnacleData['idUser'] = $_SESSION['user']['IDUSER'];

            if ($this->binnacleDao->add($binnacleData) && $this->doctorsDao->update($data)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getById($id) {
        return $this->doctorsDao->getById($id);
    }

   
}
