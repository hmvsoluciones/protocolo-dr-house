<?php

class CatalogDaoImpl extends Connection implements CatalogDao {

    private $util;

    public function __construct() {
        $this->util = new UtilImpl();
    }

    public function getAllData() {

        $query = "SELECT idCatalogo, ClaveRubroCATS, ClaveEntidadCATS, EstatusRegistroCATS, DescripcionCATS, ClaveJustificadaCATS, ClasificadorNumerico01CATS, ClasificadorNumerico02CATS, ClasificadorAlfanumerico01CATS, ClasificadorAlfanumerico02CATS,        ObservacionesCATS, IDUSERALTA, CONCAT(ua.NAME, ' ', ua.LASTNAME) USERALTA, FechaAltaCATS, IDUSERUPDATE, CONCAT(uu.NAME, ' ', uu.LASTNAME) USERUPDATE, FechaCambioCATS "
                . " FROM catalogos "
                . " INNER JOIN admuser ua ON ua.IDUSER = catalogos.IDUSERALTA"
                . " LEFT JOIN admuser uu ON uu.IDUSER = catalogos.IDUSERUPDATE";

        return $this->getAll($query);
    }

    public function add($data) {
       $data['clasificadorNumerico01CATS'] = (empty($data['clasificadorNumerico01CATS']))?"null":$data['clasificadorNumerico01CATS'];
       $data['clasificadorNumerico02CATS'] = (empty($data['clasificadorNumerico02CATS']))?"null":$data['clasificadorNumerico02CATS'];

        $query = "INSERT INTO catalogos( "
                . " ClaveRubroCATS, ClaveEntidadCATS, EstatusRegistroCATS,"
                . " DescripcionCATS, ClaveJustificadaCATS, ClasificadorNumerico01CATS, ClasificadorNumerico02CATS,"
                . " ClasificadorAlfanumerico01CATS, ClasificadorAlfanumerico02CATS, ObservacionesCATS, IDUSERALTA,"
                . " FechaAltaCATS)"
                . " VALUES( '{$data['claveRubroCATS']}', '{$data['claveEntidadCATS']}', '{$data['estatusRegistroCATS']}', "
                . " '{$data['descripcionCATS']}', '{$data['claveJustificadaCATS']}', {$data['clasificadorNumerico01CATS']}, {$data['clasificadorNumerico02CATS']},"
                . " '{$data['clasificadorAlfanumerico01CATS']}', '{$data['clasificadorAlfanumerico02CATS']}', '{$data['observacionesCATS']}', {$data['IDUSERALTA']}, "
                . " '{$data['fechaAltaCATS']}')";


        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {

       $data['clasificadorNumerico01'] = (empty($data['clasificadorNumerico01']))?"null":$data['clasificadorNumerico01'];
       $data['clasificadorNumerico02'] = (empty($data['clasificadorNumerico02']))?"null":$data['clasificadorNumerico02'];


        $query = "UPDATE catalogos "
                . " SET claveRubroCATS = '{$data['claveRubro']}',"
                . " ClaveEntidadCATS ='{$data['claveEntidad']}', "
                . " EstatusRegistroCATS = '{$data['estatusRegistro']}', "
                . " DescripcionCATS = '{$data['descripcion']}', "
                . " ClaveJustificadaCATS = '{$data['claveJustificada']}', "
                . " ClasificadorNumerico01CATS = {$data['clasificadorNumerico01']}, "
                . " ClasificadorNumerico02CATS = {$data['clasificadorNumerico02']},"
                . " ClasificadorAlfanumerico01CATS = '{$data['clasificadorAlfanumerico01']}', "
                . " ClasificadorAlfanumerico02CATS = '{$data['clasificadorAlfanumerico02']}', "
                . " ObservacionesCATS= '{$data['observaciones']}', "                
                . " IDUSERUPDATE = '{$data['IDUSERUPDATE']}', "
                . " FechaCambioCATS = '{$data['fechaUpdate']}'"
                . " WHERE idCatalogo = {$data['idCatalogo']}";

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
      $query = "SELECT idCatalogo, ClaveRubroCATS, ClaveEntidadCATS, EstatusRegistroCATS, DescripcionCATS, ClaveJustificadaCATS, ClasificadorNumerico01CATS, ClasificadorNumerico02CATS, ClasificadorAlfanumerico01CATS, ClasificadorAlfanumerico02CATS, ObservacionesCATS, IDUSERALTA, FechaAltaCATS, IDUSERUPDATE, FechaCambioCATS FROM catalogos "
                . " WHERE idCatalogo = {$id}";
        return $this->getRow($query);
    }

    public function getByCvesRubros($rubros) {
        $query = "SELECT idCatalogo, ClaveRubroCATS, ClaveEntidadCATS, EstatusRegistroCATS, DescripcionCATS, ClaveJustificadaCATS, ClasificadorNumerico01CATS, ClasificadorNumerico02CATS, ClasificadorAlfanumerico01CATS, ClasificadorAlfanumerico02CATS, ObservacionesCATS, IDUSERALTA, FechaAltaCATS, IDUSERUPDATE, FechaCambioCATS FROM catalogos "
                . " WHERE ClaveRubroCATS IN({$rubros}) ORDER BY DescripcionCATS";
        return $this->getAll($query);
    }

    public function getCatalogNames() {
        $query = "SELECT  DISTINCT NombreCatalogoCATS, ClaveRubroCATS FROM catalogos ORDER BY NombreCatalogoCATS";
        return $this->getAll($query);
    }

    public function getAllDataByRubro($rubro){
        $query = "SELECT idCatalogo, ClaveRubroCATS, ClaveEntidadCATS, EstatusRegistroCATS, DescripcionCATS, ClaveJustificadaCATS, ClasificadorNumerico01CATS, ClasificadorNumerico02CATS, ClasificadorAlfanumerico01CATS, ClasificadorAlfanumerico02CATS,        ObservacionesCATS, IDUSERALTA, CONCAT(ua.NAME, ' ', ua.LASTNAME) USERALTA, FechaAltaCATS, IDUSERUPDATE, CONCAT(uu.NAME, ' ', uu.LASTNAME) USERUPDATE, FechaCambioCATS "
                . " FROM catalogos "
                . " INNER JOIN admuser ua ON ua.IDUSER = catalogos.IDUSERALTA"
                . " LEFT JOIN admuser uu ON uu.IDUSER = catalogos.IDUSERUPDATE "
                . " WHERE catalogos.ClaveRubroCATS LIKE '{$rubro}' ORDER BY DescripcionCATS";

        return $this->getAll($query);
    }
}
