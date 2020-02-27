<?php

interface CatalogDao {
 
    public function getAlldata();

    public function getAllDataByDomain($domain);
    
    public function add($data);
    
    public function update($data);
    
    public function getById($id);
    
    public function getByCvesRubros($rubros);
    
    public function getCatalogNames();    
               
}
