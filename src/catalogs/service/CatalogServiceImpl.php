<?php

class CatalogServiceImpl implements CatalogService {

    private $catalogDao;
    private $binnacleDao;

    public function __construct() {
        $this->catalogDao = new CatalogDaoImpl();
        $this->binnacleDao = new BinnacleDaoImpl();
    }

    public function getAllData() {

        return $this->catalogDao->getAllData();
    }

    public function add($data) {
        return $this->catalogDao->add($data);
    }

    public function update($data) {
        try {
            $binnacleData['idReferencia'] = $data['idCatalogo'];
            $binnacleData['claveTabla'] = 3;
            $binnacleData['dominioTabla'] = "TABLAS";
            $binnacleData['claveOperacion'] = 2;
            $binnacleData['dominioOperacion'] = "CRUD";

            $binnacleData['lastValue'] = json_encode($this->catalogDao->getById($data['idCatalogo']));
            $binnacleData['idUser'] = $_SESSION['user']['IDUSER'];


            if ($this->binnacleDao->add($binnacleData) && $this->catalogDao->update($data)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getById($id) {
        return $this->catalogDao->getById($id);
    }

    public function getByCvesRubros($rubros) {
        return $this->catalogDao->getByCvesRubros($rubros);
    }

    public function getCatalogNames() {
        return $this->catalogDao->getCatalogNames();
    }

    public function getAllDataByRubro($rubro) {

        return $this->catalogDao->getAllDataByRubro($rubro);
    }

}
