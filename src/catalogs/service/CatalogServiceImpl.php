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
    public function getAllDataByDomain($domain) {

        return $this->catalogDao->getAllDataByDomain($domain);
    }

    public function add($data) {
        return $this->catalogDao->add($data);
    }

    public function update($data) {
        try {

            $binnacleData['referenceId'] = $data['idCatalogm'];
            $binnacleData['tableCatalogKey'] = 2;
            $binnacleData['tableDomain'] = "CAT_TABLES";
            $binnacleData['operationCatalogKey'] = 1;
            $binnacleData['operationDomain'] = "CAT_CRUD";
            
            $binnacleData['lastValue'] = json_encode($this->catalogDao->getById($data['idCatalogm']));
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

}
