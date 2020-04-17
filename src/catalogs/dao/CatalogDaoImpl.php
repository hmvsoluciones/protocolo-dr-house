<?php

class CatalogDaoImpl extends Connection implements CatalogDao {

    private $util;

    public function __construct() {
        $this->util = new UtilImpl();
    }

    public function getAllData() {

        $query = "SELECT IDCATALOG, DOMAIN, CATALOGKEY, VALUEES, VALUEEN, CATALOGORDER, DESCRIPTION, STATE FROM catalogs";

        return $this->getAll($query);
    }

    public function getAllDataByDomain($domain){
        $query = "SELECT IDCATALOG, DOMAIN, CATALOGKEY, VALUEES, VALUEEN, CATALOGORDER, DESCRIPTION, STATE FROM catalogs WHERE DOMAIN LIKE '{$domain}'";

        return $this->getAll($query);
    }

    public function add($data) {

        $query = "INSERT INTO catalogs(DOMAIN, CATALOGKEY, VALUEES, VALUEEN, CATALOGORDER, DESCRIPTION, STATE) VALUES "
        . " ('{$data['catalogDomain']}', {$data['catalogKey']},  '{$data['catalogValueEs']}', '{$data['catalogValueEn']}', {$data['catalogOrder']}, '{$data['catalogDescription']}', {$data['catalogState']});  ";


        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {

        $query = " UPDATE catalogs"
            . "  SET DOMAIN = '{$data['catalogDomainm']}',"
            . "   CATALOGKEY = {$data['catalogKeym']},"
            . "   VALUEES = '{$data['catalogValueEsm']}',"
            . "   VALUEEN = '{$data['catalogValueEnm']}',"
            . "   CATALOGORDER = {$data['catalogOrderm']},"
            . "   DESCRIPTION = '{$data['catalogDescriptionm']}',"
            . "   STATE = {$data['catalogStatem']}"
            . " WHERE IDCATALOG = {$data['idCatalogm']};";            

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $query = "SELECT IDCATALOG, DOMAIN, CATALOGKEY, VALUEES, VALUEEN, CATALOGORDER,DESCRIPTION, STATE FROM catalogs WHERE IDCATALOG = {$id}";

        return $this->getRow($query);
    }

    public function getByDomains($domains) {
        $query = "SELECT IDCATALOG, DOMAIN, CATALOGKEY, VALUEES, VALUEEN, CATALOGORDER,DESCRIPTION, STATE FROM catalogs "
                . " WHERE DOMAIN IN({$domains}) ORDER BY CATALOGORDER";
        return $this->getAll($query);
    }

    public function getCatalogNames() {
        $query = "SELECT DISTINCT DOMAIN FROM catalogs";
        return $this->getAll($query);
    }
}
