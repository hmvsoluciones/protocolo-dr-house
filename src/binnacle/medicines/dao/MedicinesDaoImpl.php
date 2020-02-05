<?php

class MedicinesDaoImpl extends Connection implements MedicinesDao {

    private $util;

    function MedicinesDaoImpl() {
        $this->util = new UtilImpl();
    }

    public function getAllData() {

        $query = "SELECT m.ID, "
                . "        m.CLAVEMEDICAMENTO, "
                . "        m.ESTATUSREGISTRO, "
                . "        m.DESCRIPCION, "
                . "        m.DESCCOMER, "
                . "        m.CLAVESECTORSALUD, "
                . "        m.CLAVEERICO, "
                . "        m.CLAVECODIGOBARRAS, "
                . "        cClasificacion.DescripcionCATS CLAVECLASIFICACION, "
                . "        cAreaTera.DescripcionCATS CLAVEAREATERAPEUTICA, "
                . "        cFamilia.DescripcionCATS CLAVEFAMILIA, "
                . "        cPresentacion.DescripcionCATS CLAVEPRESENTACION, "
                . "        cProveedor.DescripcionCATS CLAVEPROVEEDOR, "
                . "        cTipoUnidad.DescripcionCATS CLAVEUNIDADMEDIDA, "
                . "        m.COSTO, "
                . "        m.VOLUMEN, "
                . "        m.PESO, "
                . "        m.OSMOLARIDAD, "
                . "        m.DENSIDAD, "
                . "        m.CALORIAS, "
                . "        m.CONCENTRACION, "
                . "        m.DOSISMAXIMAKILOGRAMO, "
                . "        m.DOSISMAXIMAMETRO2, "
                . "        m.VALENCIA, "
                . "        m.CONFIGURADOR, "
                . "        m.MOSTRARONCO, "
                . "        m.MOSTRARNPT, "
                . "        m.MOSTRARANTI, "
                . "        m.CLAVEUSUARIOALTA, "
                . "        DATE_FORMAT(m.FECHAALTA,'%d-%m-%Y') AS FECHAALTA "
                . " FROM medicamentos m  "
                . " LEFT JOIN catalogos cClasificacion ON m.CLAVERUBROCLASIFICACION = cClasificacion.ClaveRubroCATS AND m.CLAVECLASIFICACION = cClasificacion.ClaveEntidadCATS "
                . " LEFT JOIN catalogos cAreaTera ON m.CLAVERUBROAREATERAPEUTICA = cAreaTera.ClaveRubroCATS AND m.CLAVEAREATERAPEUTICA = cAreaTera.ClaveEntidadCATS "
                . " LEFT JOIN catalogos cFamilia ON m.CLAVERUBROFAMILIA = cFamilia.ClaveRubroCATS AND m.CLAVEFAMILIA = cFamilia.ClaveEntidadCATS "
                . " LEFT JOIN catalogos cPresentacion ON m.CLAVERUBROPRESENTACION = cPresentacion.ClaveRubroCATS AND m.CLAVEPRESENTACION = cPresentacion.ClaveEntidadCATS "
                . " LEFT JOIN catalogos cProveedor ON m.CLAVERUBROPROVEEDOR = cProveedor.ClaveRubroCATS AND m.CLAVEPROVEEDOR = cProveedor.ClaveEntidadCATS "
                . " LEFT JOIN catalogos cTipoUnidad ON m.CLAVERUBROUNIDADMEDIDA = cTipoUnidad.ClaveRubroCATS AND m.CLAVEUNIDADMEDIDA = cTipoUnidad.ClaveEntidadCATS ";


        $json = $this->getAll($query);

        return $json;
    }

    public function add($data) {

        $query = "INSERT INTO medicamentos "
                . "( "
                . "  CLAVEMEDICAMENTO, "
                . "  ESTATUSREGISTRO, "
                . "  DESCRIPCION, "
                . "  DESCCOMER, "
                . "  CLAVESECTORSALUD, "
                . "  CLAVEERICO, "
                . "  CLAVECODIGOBARRAS, "
                . "  CLAVERUBROCLASIFICACION, "
                . "  CLAVECLASIFICACION, "
                . "  CLAVERUBROAREATERAPEUTICA, "
                . "  CLAVEAREATERAPEUTICA, "
                . "  CLAVERUBROFAMILIA, "
                . "  CLAVEFAMILIA, "
                . "  CLAVERUBROPRESENTACION, "
                . "  CLAVEPRESENTACION, "
                . "  CLAVERUBROPROVEEDOR, "
                . "  CLAVEPROVEEDOR, "
                . "  CLAVERUBROUNIDADMEDIDA, "
                . "  CLAVEUNIDADMEDIDA, "
                . "  COSTO, "
                . "  VOLUMEN, "
                . "  PESO, "
                . "  OSMOLARIDAD, "
                . "  DENSIDAD, "
                . "  CALORIAS, "
                . "  CONCENTRACION, "
                . "  DOSISMAXIMAKILOGRAMO, "
                . "  DOSISMAXIMAMETRO2, "
                . "  VALENCIA, "
                . "  CONFIGURADOR, "
                . "  MOSTRARONCO, "
                . "  MOSTRARNPT, "
                . "  MOSTRARANTI, "
                . "  CLAVEUSUARIOALTA, "
                . "  FECHAALTA "
                . ") "
                . "VALUES "
                . "( "
                . "  '{$data['medicineKey']}', "
                . "  '1', "
                . "  '{$data['medicinesDescription']}', "
                . "  '{$data['medicinesComercialDescription']}', "
                . "  '{$data['medicinesHealtSectorKey']}', "
                . "  '{$data['medicinesGenericKey']}', "
                . "  '{$data['medicinesBarcodeKey']}', "
                . "  '{$data['medicinesClasificationRubro']}', "
                . "  '{$data['medicinesClasification']}', "
                . "  '{$data['medicinesTherapeuticAreaRubro']}', "
                . "  '{$data['medicinesTherapeuticArea']}', "
                . "  '{$data['medicinesFamilyRubro']}', "
                . "  '{$data['medicinesFamily']}', "
                . "  '{$data['medicinesPresentationRubro']}', "
                . "  '{$data['medicinesPresentation']}', "
                . "  '{$data['medicinesProviderRubro']}', "
                . "  '{$data['medicinesProvider']}', "
                . "  '{$data['medicinesUnitOfMeasurementRubro']}', "
                . "  '{$data['medicinesUnitOfMeasurement']}', "
                . "  '{$data['medicinesCost']}', "
                . "  '{$data['medicinesVolume']}', "
                . "  '{$data['medicinesWeight']}', "
                . "  '{$data['medicinesOsmolarity']}', "
                . "  '{$data['medicinesDensity']}', "
                . "  '{$data['medicinesCalories']}', "
                . "  '{$data['medicinesConcentration']}', "
                . "  '{$data['medicinesMaximumDoseKilogram']}', "
                . "  '{$data['medicinesMaximumDoseMeter2']}', "
                . "  '{$data['medicinesValencia']}', "
                . "  '{$data['medicinesConfigurator']}', "
                . "  '{$data['medicinesShowOnco']}', "
                . "  '{$data['medicinesShowNpt']}', "
                . "  '{$data['medicinesShowAnti']}', "
                . "  '{$_SESSION['user']['USER']}', "
                . "  curdate() "
                . ")";

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {
        $query = "UPDATE medicamentos"
                . "    SET CLAVEMEDICAMENTO = '{$data['medicineKey']}', "
                . "        ESTATUSREGISTRO = '{$data['state']}', "
                . "        DESCRIPCION = '{$data['medicinesDescription']}',"
                . "        DESCCOMER = '{$data['medicinesComercialDescription']}',"
                . "        CLAVESECTORSALUD = '{$data['medicinesHealtSectorKey']}',"
                . "        CLAVEERICO = '{$data['medicinesGenericKey']}',"
                . "        CLAVECODIGOBARRAS = '{$data['medicinesBarcodeKey']}',"
                . "        CLAVERUBROCLASIFICACION = '{$data['medicinesClasificationRubro']}',"
                . "        CLAVECLASIFICACION = '{$data['medicinesClasification']}',"
                . "        CLAVERUBROAREATERAPEUTICA = '{$data['medicinesTherapeuticAreaRubro']}',"
                . "        CLAVEAREATERAPEUTICA = '{$data['medicinesTherapeuticArea']}',"
                . "        CLAVERUBROFAMILIA = '{$data['medicinesFamilyRubro']}',"
                . "        CLAVEFAMILIA = '{$data['medicinesFamily']}',"
                . "        CLAVERUBROPRESENTACION = '{$data['medicinesPresentationRubro']}',"
                . "        CLAVEPRESENTACION = '{$data['medicinesPresentation']}',"
                . "        CLAVERUBROPROVEEDOR = '{$data['medicinesProviderRubro']}',"
                . "        CLAVEPROVEEDOR = '{$data['medicinesProvider']}',"
                . "        CLAVERUBROUNIDADMEDIDA = '{$data['medicinesUnitOfMeasurementRubro']}',"
                . "        CLAVEUNIDADMEDIDA = '{$data['medicinesUnitOfMeasurement']}',"
                . "        COSTO = '{$data['medicinesCost']}',"
                . "        VOLUMEN = '{$data['medicinesVolume']}',"
                . "        PESO = '{$data['medicinesWeight']}',"
                . "        OSMOLARIDAD = '{$data['medicinesOsmolarity']}',"
                . "        DENSIDAD = '{$data['medicinesDensity']}',"
                . "        CALORIAS = '{$data['medicinesCalories']}',"
                . "        CONCENTRACION = '{$data['medicinesConcentration']}',"
                . "        DOSISMAXIMAKILOGRAMO = '{$data['medicinesMaximumDoseKilogram']}',"
                . "        DOSISMAXIMAMETRO2 = '{$data['medicinesMaximumDoseMeter2']}',"
                . "        VALENCIA = '{$data['medicinesValencia']}',"
                . "        CONFIGURADOR = '{$data['medicinesConfigurator']}',"
                . "        MOSTRARONCO = '{$data['medicinesShowOnco']}',"
                . "        MOSTRARNPT = '{$data['medicinesShowNpt']}',"
                . "        MOSTRARANTI = '{$data['medicinesShowAnti']}'"
                . " WHERE ID = '{$data['id']}'";        

                
        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $query = "SELECT ID, CLAVEMEDICAMENTO, ESTATUSREGISTRO, DESCRIPCION, DESCCOMER, CLAVESECTORSALUD, CLAVEERICO, CLAVECODIGOBARRAS, CLAVERUBROCLASIFICACION, CLAVECLASIFICACION, CLAVERUBROAREATERAPEUTICA, CLAVEAREATERAPEUTICA, CLAVERUBROFAMILIA, CLAVEFAMILIA, CLAVERUBROPRESENTACION, CLAVEPRESENTACION, CLAVERUBROPROVEEDOR, CLAVEPROVEEDOR, CLAVERUBROUNIDADMEDIDA, CLAVEUNIDADMEDIDA, COSTO, VOLUMEN, PESO, OSMOLARIDAD, DENSIDAD, CALORIAS, CONCENTRACION, DOSISMAXIMAKILOGRAMO, DOSISMAXIMAMETRO2, VALENCIA, CONFIGURADOR, MOSTRARONCO, MOSTRARNPT, MOSTRARANTI, CLAVEUSUARIOALTA, FECHAALTA FROM medicamentos WHERE ID = {$id}";

        return $this->getRow($query);
    }

}
