<?php

class DoctorsDaoImpl extends Connection implements DoctorsDao {

    private $util;
   

    function DoctorsDaoImpl() {
        $this->util = new UtilImpl();
       
    }

    public function getAllData() {

        $query = "SELECT ID, MATRICULAMEDICO, ESTATUSREGISTRO, RFC, CURP, CEDULAPROFESIONAL, NOMBRE, APELLIDOPATERNO, APELLIDOMATERNO, CLAVERUBROESPECIALIDAD,CLAVEESPECIALIDAD, TELEFONOS, DATE_FORMAT(FECHAINGRESO, '%d-%m-%Y') as FECHAINGRESO, OBSERVACIONES, CLAVEUSUARIOALTA, DATE_FORMAT(FECHAALTA, '%d-%m-%Y') as FECHAALTA FROM medicos";

        $json = $this->getAll($query);

        return $json;
    }

    public function add($data) {


        $query = "INSERT INTO medicos(MATRICULAMEDICO, ESTATUSREGISTRO, RFC, CURP, CEDULAPROFESIONAL, NOMBRE, APELLIDOPATERNO, APELLIDOMATERNO, CLAVERUBROESPECIALIDAD, CLAVEESPECIALIDAD, TELEFONOS, FECHAINGRESO, OBSERVACIONES, CLAVEUSUARIOALTA, FECHAALTA)"
                . " VALUES( '{$data['matriculaMedico']}', '{$data['estatusRegistro']}', '{$data['rfc']}', '{$data['curp']}', '{$data['cedulaProfesional']}', '{$data['nombre']}', '{$data['apellidoPaterno']}', '{$data['apellidoMaterno']}', '{$data['claveRubroEspecialidad']}', '{$data['claveEspecialidad']}', '{$data['telefonos']}', '{$data['fechaIngreso']}', '{$data['observaciones']}', '{$_SESSION['user']['USER']}', curdate());";

        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {
       $query = "UPDATE medicos SET MATRICULAMEDICO = '{$data['matriculaMedico']}', ESTATUSREGISTRO = '{$data['estatusRegistro']}', RFC = '{$data['rfc']}', CURP = '{$data['curp']}', CEDULAPROFESIONAL = '{$data['cedulaProfesional']}', NOMBRE = '{$data['nombre']}', APELLIDOPATERNO = '{$data['apellidoPaterno']}', APELLIDOMATERNO = '{$data['apellidoMaterno']}', CLAVERUBROESPECIALIDAD = '{$data['claveRubroEspecialidad']}', CLAVEESPECIALIDAD = '{$data['claveEspecialidad']}', TELEFONOS = '{$data['telefonos']}', FECHAINGRESO = '{$data['fechaIngreso']}',       OBSERVACIONES = '{$data['observaciones']}',               CLAVEUSUARIOCAMBIO = '{$_SESSION['user']['USER']}', FECHACAMBIO = curdate() WHERE ID = {$data['id']};";
              
        if ($this->executeQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $query = "SELECT ID, MATRICULAMEDICO, ESTATUSREGISTRO, RFC, CURP, CEDULAPROFESIONAL, NOMBRE, APELLIDOPATERNO, APELLIDOMATERNO, CLAVERUBROESPECIALIDAD, CLAVEESPECIALIDAD, TELEFONOS, DATE_FORMAT(FECHAINGRESO, '%d-%m-%Y') as FECHAINGRESO, OBSERVACIONES, CLAVEUSUARIOALTA, DATE_FORMAT(FECHAALTA, '%d-%m-%Y') as FECHAALTA, CLAVEUSUARIOCAMBIO, DATE_FORMAT(FECHACAMBIO, '%d-%m-%Y') as FECHACAMBIO FROM medicos WHERE ID = {$id}";

        return $this->getRow($query);
    }

}
