<?php

class LoginDaoImpl extends Connection implements LoginDao {

    private $util;

    public function __construct() {
        $this->util = new UtilImpl();
    }

    public function login($loginRequest) {

        $query = "SELECT IDUSER, NAME, LASTNAME, LASTNAME2, MAIL, USER, STATE FROM admuser "
                . " WHERE  STATE = 1 AND USER LIKE '{$loginRequest->getUser()}' AND CREDENTIAL LIKE '{$this->util->encrypt($loginRequest->getPassword())}'";


        return $this->getRow($query);
    }

    public function getRolesByUser($idUser) {

        $query = "SELECT R.*  FROM role R INNER JOIN userroles UR ON UR.IDROLE = R.IDROLE AND IDUSER = {$idUser} ORDER BY NAME";

        return $this->getAll($query);
    }

    public function getMenusByRole($idRole) {
        $query = "SELECT * FROM menu WHERE IDROLE = {$idRole}";

        return $this->getAll($query);
    }

    public function getSubMenusByIdMenu($idMenu) {
        $query = "SELECT * FROM submenu WHERE IDMENU = {$idMenu}";

        return $this->getAll($query);
    }

    public function getAllRoles($language) {

        if ($language == "EN") {
            $query = "SELECT R.IDROLE, R.NAMEEN AS NAME FROM role R ORDER BY R.NAMEEN";
        } else {
            $query = "SELECT R.IDROLE, R.NAME FROM role R ORDER BY R.NAME";
        }

        return $this->getAll($query);
    }

    public function hasRole($idRole, $idUser) {

        $query = "SELECT R.IDROLE FROM userroles R WHERE R.IDROLE = {$idRole} AND R.IDUSER = {$idUser}";

        return $this->getRow($query);
    }

    public function addRole($idRole, $idUser) {
        $query = "INSERT INTO userroles(IDUSER, IDROLE) VALUES({$idUser}, {$idRole})";
        return $this->executeQuery($query);
    }

    public function removeRole($idRole, $idUser) {
        $query = "DELETE FROM userroles WHERE IDUSER = {$idUser} AND IDROLE = {$idRole}";
        return $this->executeQuery($query);
    }

    public function updatePassword($idUser, $new) {
        $query = "UPDATE admuser SET CREDENTIAL = '{$this->util->encrypt($new)}' WHERE IDUSER = {$idUser}";
        return $this->executeQuery($query);
    }

}
