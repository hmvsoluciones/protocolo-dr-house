<?php

class BinnacleServiceImpl implements BinnacleService {
    
    private $binnacleDao;

    public function __construct() {
        $this->binnacleDao = new BinnacleDaoImpl();
    }

    public function binnacleSearch($data){        
        return $this->binnacleDao->binnacleSearch($data);
    }
}
