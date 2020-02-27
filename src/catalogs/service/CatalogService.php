<?php

interface CatalogService {
    
    public function getAllData();

    public function getAllDataByDomain($domain);
    
    public function add($data);
    
    public function getById($id);
    
    public function update($data);
    
    public function getByCvesRubros($rubros);
    
    public function getCatalogNames();
    
    
    
}
